<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'status',
        'logo',
        'slug',
        'customization',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'profiles');
    }

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class);
    }
}
