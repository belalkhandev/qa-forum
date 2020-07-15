<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function userFrom()
    {
        return $this->belongsTo(User::class, 'notification_from_user_id', 'id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'notification_to_user_id', 'id');
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class, 'notification_for_id', 'id')->where('notification_for', 'question');
    }
}
