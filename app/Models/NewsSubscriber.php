<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsSubscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];
}
