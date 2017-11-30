<?php

namespace App\Http\Controllers;

use App\User;
use App\Access;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::wherein('access_id', [1, 2])->get();
        $accesses = Access::all();
        return view('contents-admin.staff', compact('staffs', 'accesses'));
    }

    public function addstaff()
    {
    	$staffs = User::wherein('access_id', [1, 2])->get();
    	$accesses = Access::all();
    	$func = "add";
        return view('contents-admin.staff', compact('staffs', 'accesses', 'func'));
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
        $staff = new User;

        $staff->username = Input::get('username');
        $staff->password = 'mtroskillstaff';
        $staff->first_name = Input::get('first_name');
        $staff->phone = Input::get('phone');
        $staff->email = Input::get('email');
        $staff->note = Input::get('note');
        $staff->access_id = Input::get('access_id');
        $staff->contact_person = Input::get('contact_person');
        $staff->modified_by = Auth::user();
        
        $staff->save();

        return Redirect::to('staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
    	$staffs = User::wherein('access_id', [1, 2])->where('username', 'like', '%'.$search.'%')->orwhere('first_name', 'like', '%'.$search.'%')->orwhere('last_name', 'like', '%'.$search.'%')->get();
        $accesses = Access::all();
    	return view('contents-admin.staff', compact('staffs', 'accesses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$staffs = User::wherein('access_id', [1, 2])->get();
        $result = User::find($id);
        $accesses = Access::all();
        $func = "edit";
        return view('contents-admin.staff', compact('staffs', 'accesses', 'result', 'func'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $staffs = User::wherein('access_id', [1, 2])->get();
        $result = User::find($id);
        $accesses = Access::all();
        $func = "delete";
        return view('contents-admin.staff', compact('staffs', 'accesses', 'result', 'func'));
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
        $staff = User::find($id);

        $staff->username = Input::get('username');
        $staff->first_name = Input::get('first_name');
        $staff->phone = Input::get('phone');
        $staff->email = Input::get('email');
        $staff->note = Input::get('note');
        $staff->access_id = Input::get('access_id');
        $staff->contact_person = Input::get('contact_person');
        $staff->modified_by = Auth::user();
        
        $staff->save();

        return Redirect::to('staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	User::find($id)->delete();
    	return Redirect::to('staff');
    }
}
