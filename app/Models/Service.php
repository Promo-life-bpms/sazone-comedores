<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'dining_room_id',
    ];

    protected $table = 'service';

    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }
    
}
