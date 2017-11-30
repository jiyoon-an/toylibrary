<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispose extends Model
{
    public function toy()
    {
    	return $this->belongsTo(Toy::class);    	
    }
}
