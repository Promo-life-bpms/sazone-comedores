<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public $table = 'coupons';

    protected $fillable = [
        'name',
        'img',
        'discount',
        'start',
        'end',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'ilimited',
        'only_one_use',
        'one_use_peer_day',
        'other',
    ];
}
