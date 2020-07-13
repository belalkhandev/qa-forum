<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(AnswerVote::class, 'answer_id', 'id')->where('like', 1);
    }

    public function dislikes()
    {
        return $this->hasMany(AnswerVote::class, 'answer_id', 'id')->where('like', 0);
    }

}