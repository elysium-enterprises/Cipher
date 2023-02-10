<?php

use App\Http\Controllers\GenericInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeController;

Route::get('/', [GenericInfoController::class, 'index'])->name('status');

Route::middleware(['auth'])->group(function () {
    Route::get('/members/@me', [MeController::class, 'index'])->name('members.me.view');
});
// // Direct Message

// Route::post('messages/{channel}', [APIMessageController::class, 'create'])->name('direct.create');
// Route::get('messages/{channel}', [APIMessageController::class, 'index'])->name('direct.list');
// Route::patch('messages/{channel}/message', [APIMessageController::class, 'edit'])->name('direct.edit');
// Route::delete('messages/{channel}/:message', [APIMessageController::class, 'delete'])->name('direct.delete');

// // Member

// Route::post('member/{member}', [APIMemberController::class, 'add'])->name('member.add');
// Route::get('member/{member}', [APIMemberController::class, 'member'])->name('member.info');

// // Me

// Route::get('member/@me', [APIMemberController::class, 'me'])->name('me.info');
// Route::patch('member/@me', [APIMemberController::class, 'editMe'])->name('me.edit');

// // Swarm

// Route::get('swarm', [APISwarmController::class, 'swarm'])->name('swarm.list');

// // Hives

// Route::get('swarm/{hive}', [APIHiveController::class, 'index'])->name('hive.info');
// Route::patch('swarm/{hive}', [APIHiveController::class, 'edit'])->name('hive.edit');
// Route::delete('swarm/{hive}', [APIHiveController::class, 'leave'])->name('hive.leave');;

// // Channels

// Route::post('swarm/{hive}', [APIHiveChannelController::class, 'createChannel'])->name('channel.create');
// Route::get('swarm/{hive}', [APIHiveChannelController::class, 'index'])->name('channel.list');
// Route::patch('swarm/{hive}/{channel}', [APIHiveChannelController::class, 'editChannel'])->name('channel.edit');
// Route::delete('swarm/{hive}/{channel}', [APIHiveChannelController::class, 'deleteChannel'])->name('channel.delete');

// // Messages

// Route::post('swarm/{hive}/{channel}', [APIHiveMessageController::class, 'createMessage'])->name('messages.create');
// Route::get('swarm/{hive}/{channel}', [APIHiveMessageController::class, 'index'])->name('messages.list');
// Route::patch('swarm/{hive}/{channel}/:message', [APIHiveMessageController::class, 'editMessage'])->name('messages.edit');
// Route::delete('swarm/{hive}/{channel}/:message', [APIHiveMessageController::class, 'editMessage'])->name('messages.edit');

