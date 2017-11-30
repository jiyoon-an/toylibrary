<?php

namespace App;

use App\AgeGroup;
use App\ToyGroup;
use App\LoanType;
use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    public function age_group()
    {
    	return $this->belongsTo(AgeGroup::class);    	
    }
    public function toy_group()
    {
    	return $this->belongsTo(ToyGroup::class);    	
    }
    public function loan_type()
    {
    	return $this->belongsTo(LoanType::class);    	
    }
    public function toy_pieces()
    {
        return $this->hasMany(ToyPiece::class);
    }

    public function loan_history()
    {
        return $this->belongsTo(LoanHistory::class);
    }

    public function lengthofown()
    {
        $now = new DateTime;
        $date = $now - diff($this);

        $year = $diff->y;
        $month = ($diff->y * 12) + $diff->m;
        $day = $diff->days;

        $length = ($d = $diff->d) ? ' and '. $d . ngettext(" day", " days", $d) : '';
        $length = ($m = $diff->m) ? ($length ? ', ' : ' and '). $m . ngettext(" month", " months", $m).$length : $length;
        $length = ($y = $diff->y) ? $y . ngettext(" year", " years", $y).$length  : $length;

        return $length;
    }
}
