<?php

namespace App\Http\Controllers;

use App\LoanHistory;
use App\Toy;
use App\Member;
use App\LoanDetail;
use App\Transaction;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class MoneyController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toys = Toy::all();
        $members = Member::all();
        return view('contents-admin.loansbymember', compact('toys', 'members'));
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
        $cost = LoanDetail::select(DB::raw('loan_details.loan_cost as cost'))->leftjoin('members', 'members.membership_id', '=', 'loan_details.membership_id')->where('members.id', Input::get("member_id"))->get();
        $weeks = LoanDetail::leftjoin('members', 'members.membership_id', '=', 'loan_details.membership_id')->where('members.id', Input::get("member_id"))->get();
        $period = $weeks->get(0)->loan_period;
        
        $loanhistory = new LoanHistory;

        $loanhistory->toy_id = Input::get('toy_id');
        $loanhistory->member_id = Input::get('member_id');
        $loanhistory->issue_date = Carbon::now();
        $loanhistory->due_date = Carbon::now()->addWeeks($period);
        $loanhistory->cost = $cost;
        $loanhistory->modified_by = Auth::user();

        $loanhistory->save();

        return Redirect::to('loansbymember');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id, $toy_id)
    {
        $currentloans = LoanHistory::where('loan_histories.member_id', $member_id)->where('loan_histories.toy_id', $toy_id)->get();
        $newloans = LoanHistory::where('loan_histories.member_id', $member_id)->where('loan_histories.toy_id', $toy_id)->where('issue_date', '>=', Carbon::now()->subWeek())->get();
        $toy_pieces = Toy::all();
        $toys = Toy::all();
        $members = Member::all();
        $total_transaction = Transaction::select(DB::raw('sum("credit") as total_transaction'))->where('member_id', $member_id)->whereNotNull('credit')->get()->first();
        $bcf = LoanHistory::select(DB::raw('sum("cost") as bcf'))->where('member_id', $member_id)->whereNotNull('returned_date')->get()->first();
        $finerefund = Transaction::select(DB::raw('sum("credit") as findrefund'))->where('member_id', $member_id)->where(function ($query) {
                $query->where('type', 'FINE')->orwhere('type', 'REFUND');
        })->get()->first();
        $payment = Transaction::select(DB::raw('sum("credit") as payment'))->where('member_id', $member_id)->where('type', 'PAYMENT')->get()->first();
        return view('contents-admin.loansbymember', compact('currentloans', 'newloans', 'toy_pieces', 'toys', 'members', 'total_transaction', 'bcf', 'finerefund', 'payment'));
        //return $total_transaction;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatereturninloansbymember(Request $request, $id)
    {
        $loanhistory = LoanHistory::find($id);

        $loanhistory->returned_date = Carbon::now();
        $loanhistory->modified_by = Auth::user();

        $loanhistory->save();

        return Redirect::to('loansbymember');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatereissueinloansbymember(Request $request, $id)
    {
        $loanhistory = LoanHistory::find($id);

        $reissue = Input::get('reissue');
        if($reissue===null){
            $reissue = 1;
        } else {
            $reissue = $reissue + 1;
        }

        $loanhistory->reissues_remaining = $reissue;
        $loanhistory->modified_by = Auth::user();
        $loanhistory->save();

        return Redirect::to('loansbymember');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allloans()
    {
        $loanhistories = LoanHistory::all();
        return view('contents-admin/allloans', compact('loanhistories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showloans($search)
    {
        $loanhistories = LoanHistory::leftjoin('members', 'loan_histories.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->leftjoin('toys', 'loan_histories.toy_id', '=', 'toys.id')->where('users.username', 'like', '%'.$search.'%')->orwhere('toys.name', 'like', '%'.$search.'%')->get();
        return view('contents-admin.allloans', compact('loanhistories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatereturn(Request $request, $id)
    {
        $loanhistory = LoanHistory::find($id);

        $loanhistory->returned_date = Carbon::now();
        $loanhistory->modified_by = Auth::user();

        $loanhistory->save();

        return Redirect::to('allloans');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatereissue(Request $request, $id)
    {
        $loanhistory = LoanHistory::find($id);

        $reissue = Input::get('reissue');
        if($reissue===null){
            $reissue = 1;
        } else {
            $reissue = $reissue + 1;
        }

        $loanhistory->reissues_remaining = $reissue;
        $loanhistory->modified_by = Auth::user();
        $loanhistory->save();

        return Redirect::to('allloans');
    }
}
