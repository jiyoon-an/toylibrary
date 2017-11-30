<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToyPiece extends Model
{
    public function toy()
    {
    	return $this->belongsTo(Toy::class);
    }
}
