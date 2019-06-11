<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'company', 'address', 'company_website', 'university', 'experience', 'background',
        'facebook', 'twitter', 'instagram', 'linkedin'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review', 'lawyer_id');
    }
}
