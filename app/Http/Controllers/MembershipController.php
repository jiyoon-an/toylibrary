<?php

namespace App\Http\Controllers;

use App\Membership;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class MembershipController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('contents-admin.membershiptypelist', compact('memberships'));
    }

    public function addmembership()
    {   
        $func = 'add';
        return view('contents-admin.membership', compact('func'));
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
        $membership = new Membership;

        $membership->name = Input::get('name');
        $membership->fee = Input::get('fee');
        $membership->period = Input::get('period');
        $membership->end_date = Input::get('end_date');
        $membership->expiry_grace_period = Input::get('expiry_grace_period');
        $membership->archive_period = Input::get('archive_period');
        $membership->outstanding_balance_warning = Input::get('outstanding_balance_warning');
        
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $membership->is_enabled = $is_enabled;

        //default value is needed.
        $membership->minimum_bond = 0;
        $membership->maximum_bond = 0;
        $membership->admin_fee = 0;
        $membership->toys_quantity = 0;
        $membership->gold_star_toys_quantity = 0;
        $membership->note = '';
        $membership->data_target = '';
        $membership->modified_by = Auth::user();

        $membership->save();

        return Redirect::to('membershipadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $memberships = Membership::where('name', 'like', '%'.$search.'%')->get();
        return view('contents-admin.membership', compact('memberships'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::find($id);
        $func = 'edit';
        return view('contents-admin.membership', compact('membership', 'func'));
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
        $membership = Membership::find($id);

        $membership->name = Input::get('name');
        $membership->fee = Input::get('fee');
        $membership->period = Input::get('period');
        $membership->end_date = Input::get('end_date');
        $membership->expiry_grace_period = Input::get('expiry_grace_period');
        $membership->archive_period = Input::get('archive_period');
        $membership->outstanding_balance_warning = Input::get('outstanding_balance_warning');
        
        $is_enabled = Input::get('is_enabled');
        if(empty($is_enabled))
            $is_enabled = 0;
        $membership->is_enabled = $is_enabled;
        $membership->modified_by = Auth::user();

        $membership->save();

        return Redirect::to('membershipadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membership::find($id)->delete();
        return Redirect::to('membershipadmin');
    }
}
