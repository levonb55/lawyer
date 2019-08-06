<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::select('sender_id', 'receiver_id')
                        ->where('sender_id', auth()->id())
                        ->orWhere('receiver_id', auth()->id())
                        ->get();
        foreach($messages as $message) {
           $res[]= $message->sender_id;
           $res[]= $message->receiver_id;
        }
        $res = array_unique($res);
        $users = User::find($res);

        return view('users.messages', compact('users'));
    }

    public function show(User $sender) {
        $messagesData = Message::where(function($q) use ($sender) {
            $q->where('sender_id', auth()->id());
            $q->where('receiver_id', $sender->id);
        })->orWhere(function($q) use ($sender) {
            $q->where('sender_id', $sender->id);
            $q->where('receiver_id', auth()->id());
        })
        ->get();

        foreach($messagesData as $message) {
            $messages[]=[
                'sender_id' => $message->sender_id,
                'content' => $message->content,
                'image' => $message->senders->image,
                'created_at' => $message->created_at
            ];
        }
        return response()->json($messages);
    }
}
