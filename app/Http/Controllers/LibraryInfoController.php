<?php

namespace App\Http\Controllers;

use App\LibraryInfo;
use App\Country;
use App\State;
use App\City;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;


class LibraryInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraryinfo = LibraryInfo::all()->first();

        return view('contents-admin.libraryinfo', compact('libraryinfo'));
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
    public function store()
    {
        //
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
        $libraryinfo = LibraryInfo::find($id);
        $country = Country::find($libraryinfo->country_id);
        $cities = City::whereIn('state_id', State::select(DB::raw('id'))->where('country_id', $libraryinfo->country_id)->get())->get();
        return view('contents-admin.libraryinfoedit', compact('libraryinfo', 'country', 'cities'));
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
        $libraryinfo = LibraryInfo::find($id);

        $libraryinfo->name = Input::get('name');
        $libraryinfo->no = Input::get('no');
        $libraryinfo->building = Input::get('building');
        $libraryinfo->street = Input::get('street');
        $libraryinfo->suburb = Input::get('suburb');
        $libraryinfo->city_id = Input::get('city_id');
        $libraryinfo->post_code = Input::get('post_code');
        $libraryinfo->country_id = Input::get('country_id');
        $libraryinfo->phone = Input::get('phone');
        $libraryinfo->fax = Input::get('fax');
        $libraryinfo->mobile = Input::get('mobile');
        $libraryinfo->email = Input::get('email');
        $libraryinfo->facebook = Input::get('facebook');
        $libraryinfo->twitter = Input::get('twitter');
        $libraryinfo->google_plus = Input::get('google_plus');
        $libraryinfo->note = Input::get('note');

        if(Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path().'/img/logos/', $file->getClientOriginalName());
            $libraryinfo->image = $file->getClientOriginalName();
            $libraryinfo->size = $file->getClientsize();
            $libraryinfo->type = $file->getClientMimeType();
        }
        $libraryinfo->modified_by = Auth::user();
        
        $libraryinfo->save();
        
        return Redirect::to('libraryinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
