<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuBanner extends Model
{
    use HasFactory;

    public $table = 'menu_banner';

    protected $fillable = [
        "dining_room_id",
        "src",
    ];
    
    public function diningRoom()
    {
        return $this->belongsTo(DiningRoom::class);
    }
}
