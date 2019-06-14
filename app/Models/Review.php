<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'client_id', 'lawyer_id', 'body', 'grade', /*'created_at'*/
    ];
}
