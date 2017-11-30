<?php

namespace App\Http\Controllers;

use App\Sponsor;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class SponsorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('contents-admin.sponsorlist', compact('sponsors'));
    }

    public function addsponsor()
    {   
        $func = 'add';
        return view('contents-admin.sponsoradmin', compact('func'));
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
        $sponsor = new Sponsor;

        $sponsor->name = Input::get('name');
        if(Input::get('start_date')!="") {
            $sponsor->start_date = Input::get('start_date');    
        } 
        if(Input::get('end_date')!=""){
            $sponsor->end_date = Input::get('end_date');
        }
        $sponsor->website = Input::get('website');
        $sponsor->note = Input::get('note');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $sponsor->is_enabled = $is_enabled;
        if(Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path().'/img/sponsors/', $file->getClientOriginalName());
            $sponsor->image = $file->getClientOriginalName();
            $sponsor->size = $file->getClientsize();
            $sponsor->type = $file->getClientMimeType();
        }
        $sponsor->modified_by = Auth::user();

        $sponsor->save();

        return Redirect::to('sponsoradmin');
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
        $sponsor = Sponsor::find($id);
        $func = 'edit';
        return view('contents-admin.sponsoradmin', compact('sponsor', 'func'));
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
        $sponsor = Sponsor::find($id);

        $sponsor->name = Input::get('name');
        $sponsor->start_date = Input::get('start_date');
        $sponsor->end_date = Input::get('end_date');
        $sponsor->website = Input::get('website');
        $sponsor->note = Input::get('note');
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $sponsor->is_enabled = $is_enabled;
        if(Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path().'/img/sponsors/', $file->getClientOriginalName());
            $sponsor->image = $file->getClientOriginalName();
            $sponsor->size = $file->getClientsize();
            $sponsor->type = $file->getClientMimeType();
        }
        $sponsor->modified_by = Auth::user();

        $sponsor->save();

        return Redirect::to('sponsoradmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return Redirect::to('sponsoradmin');
    }
}
