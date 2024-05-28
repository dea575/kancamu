<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionUserAnswer extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_user_id',
        'question_id',
        'answer',
        'score'
    ];

    public function QuestionUser()
    {
        return $this->belongsTo(QuestionUser::class);
    }

    public function Question()
    {
        return $this->belongsTo(Question::class)->withTrashed();
    }
}
