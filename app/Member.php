<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'outstanding_bonds',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);       
    }
}
