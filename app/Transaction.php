<?php

namespace App;

use App\Member;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);       
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
