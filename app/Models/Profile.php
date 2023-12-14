<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "dining_room_id",
        "type",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }

}
