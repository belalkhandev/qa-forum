<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }
}
