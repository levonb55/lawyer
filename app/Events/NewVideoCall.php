<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewVideoCall implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $receiver;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($receiver, $data)
    {
        $this->receiver = $receiver;
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('call.' . auth()->id());
        return new Channel('call-' . $this->receiver);
    }

    public function broadcastWith()
    {
        return [
            'caller' => auth()->id(),
            'callerName' => auth()->user()->first_name,
            'receiver' => $this->receiver,
            'data' => $this->data
        ];
    }
}
