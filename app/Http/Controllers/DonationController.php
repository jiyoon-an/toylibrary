<?php

namespace App\Http\Controllers;

use App\Donation;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class DonationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::all();
        return view('contents-admin.donationlist', compact('donations'));
    }

    public function adddonation()
    {   
        $func = 'add';
        return view('contents-admin.donationsadmin', compact('func'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donation = new Donation;

        $donation->type = Input::get('type');
        $donation->details = Input::get('details');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $donation->is_enabled = $is_enabled;
        $donation->modified_by = Auth::user();

        $donation->save();

        return Redirect::to('donationadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = Donation::find($id);
        $func = 'edit';
        return view('contents-admin.donationsadmin', compact('donation', 'func'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donation = Donation::find($id);

        $donation->type = Input::get('type');
        $donation->details = Input::get('details');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $donation->is_enabled = $is_enabled;
        $donation->modified_by = Auth::user();

        $donation->save();

        return Redirect::to('donationadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donation::find($id)->delete();
        return Redirect::to('donationadmin');
    }
}
