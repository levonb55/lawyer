<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function getSenders(User $user) {
        $users = Message::groupBy('sender_id')->having('receiver_id', '=', $user->id)->get();
        return view('users.messages', compact('users'));
    }

    public function show(User $sender) {
        $messages = Message::where('sender_id', $sender->id)->orWhere('receiver_id', $sender->id)->get();
        return response()->json($messages);
    }
}
