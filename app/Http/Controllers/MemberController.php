<?php

namespace App\Http\Controllers;

use App\User;
use App\Access;
use App\Member;
use App\City;
use App\Country;
use App\State;
use App\LoanHistory;
use App\Toy;
use App\Transaction;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class MemberController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('contents-admin.memberlist', compact('members'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $members = Member::leftjoin('users', 'members.user_id', '=', 'users.id')->where('users.username', 'like', '%'.$search.'%')->get();
        return view('contents-admin.memberlist', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $accesses = Access::all();
        $country = Country::find($member->user->country_id);
        $cities = City::whereIn('state_id', State::select(DB::raw('id'))->where('country_id', $member->country_id)->get())->get();
        return view('contents-admin.members', compact('member', 'accesses', 'cities', 'country'));
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
        $member = Member::find($id);
        $user = User::find($member->user_id);

        $user->username = Input::get('username');
        $user->password = Input::get('password');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->no = Input::get('no');
        $user->building = Input::get('building');
        $user->street = Input::get('street');
        $user->suburb = Input::get('suburb');
        $user->city_id = Input::get('city_id');
        $user->post_code = Input::get('post_code');
        $user->phone = Input::get('phone');
        $user->mobile = Input::get('mobile');
        $user->email = Input::get('email');
        $user->note = Input::get('note');
        $user->access_id = Input::get('access_id');
        $user->contact_person = Input::get('contact_person');
        $user->contact_mobile = Input::get('contact_mobile');
        $user->contact_email = Input::get('contact_email');
        $is_active = Input::get('is_active');
        if(empty($is_active))
            $is_active = 0;
        $user->is_active = $is_active;
        $user->modified_by = Auth::user();

        $user->save();

        return Redirect::to('memberadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return Redirect::to('memberadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loanhistory()
    {
        $members = Member::all();
        return view('contents-admin.memberloanhistory', compact('members'));
    }

    public function showloanhistory(Request $request)
    {
        $loanhistories = LoanHistory::where('member_id', '=', Input::get('member'))->where(function($query) { $query->where('issue_date','>=', Input::get('from'))
                    ->orwhere('due_date','<=', Input::get('to'))
                    ->orwhere('returned_date','=', Input::get('returned'));
            })->get();
        $toys = Toy::all();
        $members = Member::all();
        return view('contents-admin.memberloanhistory', compact('members', 'loanhistories', 'toys'));
    }

    public function transactionhistory()
    {
        $members = Member::all();
        return view('contents-admin.membertransactionhistory', compact('members'));
    }

    public function showtransactionhistory(Request $request)
    {
        $transactions = Transaction::where('member_id', '=', Input::get('member'))->where(function($query) { $query->where('transaction_date','>=', Input::get('from'))
                    ->orwhere('transaction_date','<=', Input::get('to'));
            })->get();
        $members = Member::all();
        return view('contents-admin.membertransactionhistory', compact('members', 'transactions'));
    }

    public function expiredmember()
    {
        $today = Carbon::now();
        $members = Member::where('membership_expiry', '<', $today)->get();
        return view('contents-admin.expiredmemberlist', compact('members'));
    }
}
