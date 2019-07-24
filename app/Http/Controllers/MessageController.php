<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function show(User $user) {
        $users = Message::groupBy('sender_id')->having('receiver_id', '=', $user->id)->get();
        return view('users.messages', compact('users'));
    }
}
