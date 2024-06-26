<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mood',
        'date'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
