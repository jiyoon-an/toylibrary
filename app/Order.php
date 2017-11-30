<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);       
    }

    public function member()
    {
        return $this->belongsTo(Member::class);       
    }

    public function loan_history()
    {
    	return $this->belongsTo(LoanHistory::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
