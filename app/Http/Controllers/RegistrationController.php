<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller 
{
	/**
     * Verify user account
     *
     * @param  string  $confirmation_code
     * @return void
     */
    public function confirm($confirmation_code) 
    {
        if(!$confirmation_code || strlen($confirmation_code) < 30) 
        {
            Session::flash('failed', 'Invalid confirmation code.');
    		return redirect('/');
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();
        if ($user) 
        {
	        $user->is_verified = 1;
	        $user->confirmation_code = null;
	        $user->save();

			Session::flash('success', 'You have successfully verified your account.');
			Auth::guard($this->getGuard())->login($user);
        }
        else
        {
            Session::flash('failed', 'No user found.');
        }

    	return redirect('/');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
