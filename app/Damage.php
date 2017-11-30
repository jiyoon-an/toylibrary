<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    public function toy()
    {
    	return $this->belongsTo(Toy::class);    	
    }
}
