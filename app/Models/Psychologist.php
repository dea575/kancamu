<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychologist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'str',
        'sipp',
        'description',
        'experience',
        'education',
        'photo'
    ];

    public function getPhotoAttribute($value)
    {
        return $value != null ? asset('storage/'. $value) : asset('asset/no-profile.png');
    }
}
