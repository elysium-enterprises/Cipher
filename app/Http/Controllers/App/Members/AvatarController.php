<?php

namespace App\Http\Controllers\App\Members;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class AvatarController extends Controller
{

    public const AVATAR_PATH = 'dynamic/avatars';
    public const DEFAULT_AVATAR = ['default', 'png'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function calculatePath($file) {
        return resource_path() . '/' . AvatarController::AVATAR_PATH . '/' . $file[0] . '.' . $file[1];
    }

    public function show(Request $request, $id) {
        // TODO: Check relation logic
        // $path = storage_path(resource_path() . '/' . AvatarController::AVATAR_PATH . '/' . $id . '.' . AvatarController::AVATAR_EXT);
        $member = Member::find($id);
        $file = AvatarController::DEFAULT_AVATAR;

        if($member) {
            // Member exists
            if($member->avatar_mime) {
                // Member has mime type saved in DB
                $file = [$id, $member->avatar_mime];
                if (!File::exists($this->calculatePath($file))) {
                    // File is not saved in storage even though member has mime in DB, return default
                    $file = AvatarController::DEFAULT_AVATAR;
                }
                return response()->file($this->calculatePath($file));
            } else {
                // Member has not saved mime in DB, return default
                return response()->file($this->calculatePath($file));
            }
        } else {
            // Member does not exist
            return abort(404);
        }
    }

    public function showOwnAvatar(Request $request) {
        return $this->show($request, Auth::id());
    }
}
