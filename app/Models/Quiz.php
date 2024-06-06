<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'url',
        'dining_room_id',
    ];

    protected $table = 'quiz';

    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }

}
