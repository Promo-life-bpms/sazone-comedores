<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagName extends Model
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
        return $this->belongsToMany(DiningRoom::class);
    }
}
