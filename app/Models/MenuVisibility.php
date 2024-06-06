<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuVisibility extends Model
{
    use HasFactory;

    public $table = 'menu_visibility';

    protected $fillable=[
        'dining_room_id',
        'visible',
    ];
}
