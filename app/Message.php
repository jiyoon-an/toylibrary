<?php

namespace App;

use App\MessageCategory;
use App\MessageThread;
use App\User;
use App\Member;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function message_category()
    {
        return $this->belongsTo(MessageCategory::class);       
    }

    public function message_thread()
    {
        return $this->belongsTo(MessageThread::class);       
    }

    public function user()
    {
        return $this->belongsTo(User::class);       
    }

    public function member()
    {
        return $this->belongsTo(Member::class);       
    }
}
