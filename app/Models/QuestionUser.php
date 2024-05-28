<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionUser extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'result_id',
        'score',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Result()
    {
        return $this->belongsTo(Result::class)->withTrashed();
    }

    public function Question()
    {
        return $this->belongsToMany(Question::class, 'question_user_answers', 'question_user_id', 'question_id')
                    ->withPivot(['answer', 'score']);
    }

    public function QuestionUserAnswer()
    {
        return $this->hasMany(QuestionUserAnswer::class);
    }
}
