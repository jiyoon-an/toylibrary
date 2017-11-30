<?php

namespace Illuminate\Foundation\Auth;

use App\LibraryInfo;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($selected_id = null)
    {
        $libraryinfo = LibraryInfo::all()->first();
        $memberships = Membership::where('is_enabled', 1)->get();
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register', compact('libraryinfo', 'memberships', 'selected_id'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $confirmation_code = Str::random(60);
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $data = ['confirmation_code' => $confirmation_code];

        Mail::send('auth.emails.verification', $data, function($message) {
            $message->to(Input::get('email'), Input::get('username'))
                    ->subject('Account Verification');
        });

        Session::flash('success', 'Thank you for signing up! Please check your email for account verification.');

        $this->create($request->all(), $confirmation_code);
        return redirect($this->redirectPath());
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
