<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'slug'
    ];

    public function menus($dining_id)
    {
        return $this->belongsToMany(Menu::class)->where('menus.dining_room_id', $dining_id)->get();
    }
}
