<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'dining_room_id',
        'time',
        'image',
    ];

    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }

    public function daysAvailable()
    {
        return $this->belongsToMany(DayFood::class);
    }
}
