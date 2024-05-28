<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayFoodMenu extends Model
{
    use HasFactory;

    public $table = 'day_food_menu';

    protected $fillable = [
        'day_food_id',
        'menu_id'
    ];
}
