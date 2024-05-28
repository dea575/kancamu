<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'min',
        'max',
        'color',
        'image',
        'handling'
    ];

    public function getImageAttribute($value)
    {
        return $value != null ? asset('storage/'. $value) : null;
    }

    public function QuestionUser()
    {
        return $this->hasMany(QuestionUser::class);
    }
}