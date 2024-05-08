<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capsula extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'resource',
        'vigencia',
    ];
    
    public $table = 'capsulas';

    public function diningRooms()
    {
        return $this->belongsToMany(DiningRoom::class);
    }
}
