<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //Gets all messages
    public function index() {
        $messages = Message::select('sender_id', 'receiver_id')
                        ->where('sender_id', auth()->id())
                        ->orWhere('receiver_id', auth()->id())
                        ->get();
        $res = [];
        foreach($messages as $message) {
           $res[]= $message->sender_id;
           $res[]= $message->receiver_id;
        }
        $res = array_unique($res);
        $contacts = User::find($res);

        return view('users.messages', compact('contacts'));
    }

    //Gets a conversation
    public function show(User $contact, $scroll) {
        $messages = [];

        $messagesData = Message::where(function($q) use ($contact) {
            $q->where('sender_id', auth()->id());
            $q->where('receiver_id', $contact->id);
        })->orWhere(function($q) use ($contact) {
            $q->where('sender_id', $contact->id);
            $q->where('receiver_id', auth()->id());
        });

        $messagesCount = $messagesData->count();
        $messagesSkip = $scroll * 10;
        $messagesData = $messagesData
            ->orderBy('id', 'DESC')
            ->skip($messagesSkip)
            ->take(10)
            ->get();

        foreach($messagesData as $message) {
            $messages[]=[
                'sender_id' => $message->sender_id,
                'content' => $message->content,
                'image' => $message->sender->image,
                'created_at' => $message->created_at
            ];
        }

        return response()->json(['messages' => $messages, 'messagesCount' => $messagesCount]);
    }

    //Stores a new message to the database
    public function store(Request $request) {
        if ($request->ajax()){
            $message = Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $request->input('contact'),
                'content' => $request->input('content')
            ]);

            $message = Message::find($message->id);
            broadcast(new NewMessage($message))->toOthers();

            return response()->json([
                'image' => auth()->user()->image,
                'content' => $message->content,
                'created_at' => $message->created_at
            ]);
        }
    }
}
