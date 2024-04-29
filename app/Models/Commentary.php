<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;

    public $table = 'commentary';

    protected $fillable = [
        'comment',
        'user_id',
        'detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
