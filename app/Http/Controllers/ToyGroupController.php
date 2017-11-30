<?php

namespace App\Http\Controllers;

use App\ToyGroup;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class ToyGroupController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toygroups = ToyGroup::all();
        return view('contents-admin.toygrouplist', compact('toygroups'));
    }

    public function addtoygroup()
    {   
        $func = 'add';
        return view('contents-admin.toygroup', compact('func'));
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
        $toygroup = new ToyGroup;

        $toygroup->toy_group = Input::get('toy_group');
        $toygroup->description = Input::get('description');
        $toygroup->modified_by = Auth::user();

        $toygroup->save();

        return Redirect::to('toygroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $toygroups = ToyGroup::where('toy_group', 'like', '%'.$search.'%')->get();
        return view('contents-admin.toygrouplist', compact('toygroups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toygroup = ToyGroup::find($id);
        $func = 'edit';
        return view('contents-admin.toygroup', compact('toygroup', 'func'));
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
        $toygroup = ToyGroup::find($id);

        $toygroup->toy_group = Input::get('toy_group');
        $toygroup->description = Input::get('description');
        $toygroup->modified_by = Auth::user();

        $toygroup->save();

        return Redirect::to('toygroup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ToyGroup::find($id)->delete();
        return Redirect::to('toygroup');
    }
}
