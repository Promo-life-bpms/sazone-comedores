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
        'mission',
        'vision',
        'values',
        'customization',
        'statusV',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'profiles');
    }

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class);
    }

    public function tagnames()
    {
        return $this->belongsToMany(TagName::class);
    }

    public function nutritions()
    {
        return $this->belongsToMany(Nutrition::class);
    }

    public function healths()
    {
        return $this->belongsToMany(Health::class);
    }

    public function estres()
    {
        return $this->belongsToMany(Estre::class);
    }

    public function capsulas()
    {
        return $this->belongsToMany(Capsula::class);
    }
}
