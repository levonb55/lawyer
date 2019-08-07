<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receiver_id', 'content'
    ];

    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function senders()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function receivers()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }

}
