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
        'user_id', 'company', 'state', 'city', 'address', 'phone', 'postcode', 'company_website', 'university', 'experience', 'background',
        'facebook', 'twitter', 'instagram', 'linkedin'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Admin\Category');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review', 'lawyer_id', 'user_id');
    }

    public function scopeFound($query, $search)
    {
        return $query
            ->where(function ($query) use ($search) {
                $query->where('state', 'like', "%$search%")
                    ->orWhere('city', 'like', "%$search%")
                    ->orWhere('postcode', 'like', "%$search%");
            })
            ->orderBy('rating', 'DESC')
            ->get();
    }
}
