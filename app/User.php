<?php

namespace App;

use App\Access;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'first_name', 'last_name',
        'no', 'building', 'street', 'suburb', 'city_id', 'post_code', 'country_id', 
        'phone', 'mobile', 'email', 'note',
        'contact_person', 'contact_mobile', 'contact_email',
        'access_id', 'confirmation_code', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function access()
    {
        return $this->belongsTo(Access::class);       
    }
    public function isAdmin()
    {
        return ($this->access->name == 'Administrator'); // this looks for an admin column in your users table
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
