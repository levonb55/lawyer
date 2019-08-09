<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id', 'referral'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lawyer()
    {
        return $this->hasOne('App\Models\Lawyer');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Admin\Category', 'category_lawyer', 'lawyer_id', 'category_id');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function outgoingMessages() {
        return $this->hasMany('App\Models\Message', 'sender_id');
    }

    public function incomingMessages() {
        return $this->hasMany('App\Models\Message', 'receiver_id');
    }

}
