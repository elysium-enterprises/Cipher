<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login_history';

    protected $fillable = [
        'member_id',
        'ip_address',
        'user_agent',
        'login_at',
        'logout_at'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}