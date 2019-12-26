<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    const IMAGE = 'default.png';
    const ICON = 'default.png';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $attributes = [
        'image' => self::IMAGE,
        'icon' => self::ICON,
    ];

    /**
     * Get the lawyers for the category.
     */
//    public function lawyers()
//    {
//        return $this->hasMany('App\Models\Lawyer');
//    }

    /**
     * The lawyers that belong to the category.
     */
    public function lawyers()
    {
        return $this->belongsToMany('App\Models\Lawyer');
    }
}
