<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricion extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'dining_room_id',
        'image',
    ];

    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }
}
