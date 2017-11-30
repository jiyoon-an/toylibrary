<?php

namespace App\Http\Controllers;

use App\Toy;
use App\LibraryInfo;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

class ToyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraryinfo = LibraryInfo::all()->first();
        return view("admin/toymanagement", compact('libraryinfo'));
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
        $toy = new Toy;

        $toy->name = Input::get('name');
        $toy->description = Input::get('description');
        $toy->brand = Input::get('brand');
        $toy->age_group_id = Input::get('age_group_id');        
        $toy->toy_group_id = Input::get('toy_group_id');        
        $toy->loan_type_id = Input::get('loan_type_id');
        if(Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path().'/img/toys/', $file->getClientOriginalName());
            $toy->image = $file->getClientOriginalName();
            $toy->size = $file->getClientsize();
            $toy->type = $file->getClientMimeType();
        }
        $toy->shelf = Input::get('shelf');
        $toy->quantity = Input::get('quantity');
        $toy->purchased_date = Input::get('purchased_date');
        $toy->purchased_from = Input::get('purchased_from');
        $toy->purchased_price = Input::get('purchased_price');
        $toy->donated_by = Input::get('donated_by');
        $toy->note = Input::get('note');
        $toy->alert = Input::get('alert');
        $toy->status = Input::get('status');
        $toy->linked_toys = Input::get('linked_toys');

        $toy->save();

        return 'date saved in database';
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
        //
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
        //
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
