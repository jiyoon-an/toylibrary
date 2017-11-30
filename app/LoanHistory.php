<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanHistory extends Model
{
    public function member()
    {
    	return $this->belongsTo(Member::class);  
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function toy()
    {
    	return $this->belongsTo(Toy::class);  
    }

    public function loandetail()
    {
        return $this->belongsTo(LoanDetail::class);
    }

    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

    public function loantype()
    {
        return $this->belongsTo(LoanType::class);
    }
}
