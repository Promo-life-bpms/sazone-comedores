<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'resource',
        'vigencia',
    ];

    public function diningRooms()
    {
        return $this->belongsTo(DiningRoom::class);
    }
}
