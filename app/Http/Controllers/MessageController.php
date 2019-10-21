<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Requests\StoreMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    const READ = true;

    //Gets all messages
    public function index() {
        $messages = Message::select('sender_id', 'receiver_id')
                        ->where('sender_id', auth()->id())
                        ->orWhere('receiver_id', auth()->id())
                        ->get();

        $unreadIds = Message::select(\DB::raw('`sender_id`, count(`sender_id`) as messages_count'))
            ->where('receiver_id', auth()->id())
            ->where('read', false)
            ->groupBy('sender_id')
            ->get();

        $res = [];
        foreach($messages as $message) {
           $res[]= $message->sender_id;
           $res[]= $message->receiver_id;
        }

        $res = array_unique($res);

        $contacts = User::find($res)->except(auth()->id());

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : '';

            return $contact;
        });

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

        //Marks all messages as read
        $messagesData->update(['read' => self::READ]);

        $messagesCount = $messagesData->count();
        $messagesSkip = ($scroll * 10) - 10;
        $messagesData = $messagesData
            ->orderBy('id', 'DESC')
            ->skip($messagesSkip)
            ->take(10)
            ->get();

        foreach($messagesData as $message) {
            $messages[]=[
                'sender_id' => $message->sender_id,
                'name' => $message->sender->full_name,
                'content' => $message->content,
                'file_original_name' => $message->file_original_name,
                'file_new_name' => $message->file_new_name,
                'image' => $message->sender->image,
                'created_at' => $message->created_at
            ];
        }

        return response()->json(['messages' => $messages, 'messagesCount' => $messagesCount]);
    }

    //Stores a new message to the database
    public function store(StoreMessage $request) {
        if ($request->ajax()){
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '.' . $request->file->extension();
                $location = public_path('assets/attachments/');
                $file->move($location, $fileName);

                $message = Message::create([
                    'sender_id' => auth()->id(),
                    'receiver_id' => $request->input('contact'),
                    'file_original_name' => $file->getClientOriginalName(),
                    'file_new_name' => $fileName
                ]);

                $message = Message::find($message->id);
                broadcast(new NewMessage($message))->toOthers();

                return response()->json([
                    'name' => auth()->user()->full_name,
                    'image' => auth()->user()->image,
                    'file_original_name' => $message->file_original_name,
                    'file_new_name' => $message->file_new_name,
                    'created_at' => $message->created_at
                ]);
            } else {
                $message = Message::create([
                    'sender_id' => auth()->id(),
                    'receiver_id' => $request->input('contact'),
                    'content' => $request->input('content')
                ]);

                $message = Message::find($message->id);
                broadcast(new NewMessage($message))->toOthers();

                return response()->json([
                    'name' => auth()->user()->full_name,
                    'image' => auth()->user()->image,
                    'content' => $message->content,
                    'created_at' => $message->created_at
                ]);
            }
        }
    }

    public function markAsRead(Message $message)
    {
        $message->update(['read' => self::READ]);
        return response()->json('Read');
    }
}
