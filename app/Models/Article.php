<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'section'
    ];

    public function getThumbnailAttribute($value)
    {
        return $value != null ? asset('storage/'. $value) : asset('asset/no-image.svg');
    }
}
