<?php

namespace App\Http\Controllers;

use App\Toy;
use App\Damage;
use App\Dispose;
use App\AgeGroup;
use App\LoanHistory;
use App\ToyGroup;
use App\LoanType;
use App\Child;
use App\Member;
use App\Transaction;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ToyAdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toys = Toy::all();
        $loanhistories = LoanHistory::select(DB::raw('toy_id, max(issue_date) as lastchecked'))->groupBy('toy_id')->get();
        return view('contents-admin.toylist', compact('toys', 'loanhistories'));
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
        $toys = Toy::where('name', 'like', '%'.$search.'%')->orwhere('description', 'like', '%'.$search.'%')->orwhere('brand', 'like', '%'.$search.'%')->get();
        return view('contents-admin.toylist', compact('toys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toy = Toy::find($id);
        $func = 'edit';
        $agegroups = AgeGroup::all();
        $toygroups = ToyGroup::all();
        $loantypes = LoanType::all();
        return view('contents-admin.toyadmin', compact('toy', 'agegroups', 'toygroups', 'loantypes', 'func'));
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
        $toy = Toy::find($id);

        $toy->name = Input::get('name');
        $toy->description = Input::get('description');
        $toy->brand = Input::get('brand');
        $toy->age_group_id = Input::get('age_group_id');
        $toy->toy_group_id = Input::get('toy_group_id');
        $toy->loan_type_id = Input::get('loan_type_id');
        //$toy->image = Input::get('image');
        //$toy->size = Input::get('size');
        //$toy->type = Input::get('type');
        $toy->shelf = Input::get('shelf');
        //$toy->quantity = Input::get('quantity');
        $toy->purchased_date = Input::get('purchased_date');
        $toy->purchased_from = Input::get('purchased_from');
        $toy->purchased_price = Input::get('pruchased_price');
        $toy->donated_by = Input::get('donated_by');
        $toy->note = Input::get('note');
        $toy->alert = Input::get('alert');
        $toy->status = Input::get('status');
        $toy->linked_toys = Input::get('linked_toys');
        $toy->modified_by = Auth::user();

        $toy->save();

        return Redirect::to('toyadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Toy::find($id)->delete();
        return Redirect::to('toyadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function damagedtoy()
    {
        $damages = Damage::all();
        return view('contents-admin.damagedtoyslist', compact('damages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disposedtoy()
    {
        $disposes = Dispose::all();
        return view('contents-admin.disposedtoys', compact('disposes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toysforsale()
    {
        $toys = Toy::all();
        $members = Member::all();
        $toysforsale = Toy::where('status', 'FOR SALE')->get();
        return view('contents-admin.toysforsale', compact('toys', 'toysforsale', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateadd(Request $request)
    {
        $toy = Toy::find(Input::get('toy_id'));
        $toy->status = 'FOR SALE';
        $toy->modified_by = Auth::user();
        $toy->save();

        return Redirect::to('toysforsale');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateconfirm(Request $request)
    {
        $toy = Toy::find(Input::get('toy_id'));
        $toy->status = 'DISPOSE';
        $toy->modified_by = Auth::user();
        $toy->save();

        $dispose = new Dispose;
        $dispose->toy_id = Input::get('toy_id');
        $dispose->disposal_method = 'SOLD';
        $dispose->disposal_date = Carbon::now();
        $dispose->disposal_price = Input::get('price');
        $dispose->modified_by = Auth::user();
        $dispose->save();

        $transaction = new Transaction;
        $transaction->member_id = Input::get('member_id');
        $transaction->transaction_date = Carbon::now();
        $transaction->staff_id = 1;
        $transaction->type = 'PAYMENT';
        $transaction->modified_by = Auth::user();
        $transaction->save();

        return Redirect::to('toysforsale');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedispose(Request $request)
    {
        $toy = Toy::find(Input::get('toy_id'));
        $toy->status = 'DISPOSE';
        $toy->modified_by = Auth::user();
        $toy->save();

        $dispose = new Dispose;
        $dispose->toy_id = Input::get('toy_id');
        $dispose->disposal_method = 'DUMPED';
        $dispose->disposal_date = Carbon::now();
        $dispose->modified_by = Auth::user();
        $dispose->save();

        return Redirect::to('toysforsale');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateremove(Request $request)
    {
        $toy = Toy::find(Input::get('toy_id'));
        $toy->status = 'LOAN';
        $toy->modified_by = Auth::user();
        $toy->save();

        return Redirect::to('toysforsale');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loanhistory()
    {
        $toys = Toy::all();
        return view('contents-admin.toyloanhistory', compact('toys'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showloanhistory(Request $request)
    {
        $loanhistories = LoanHistory::where('toy_id', '=', Input::get('toy'))->where(function($query) { $query->where('issue_date','>=', Input::get('from'))
                    ->orwhere('due_date','<=', Input::get('to'))
                    ->orwhere('returned_date','=', Input::get('returned'));
            })->get();
        $toys = Toy::all();

        return view('contents-admin.toyloanhistory', compact('loanhistories', 'toys', 'count'));
    }

    public function agegrouplist()
    {
        $today = Carbon::now();
        $children_total = Child::count();
        
        $children_male = [0 => Child::whereBetween('birth_date', [$today->subMonths(3), $today])->where('gender', '=', 'male')->count()];
        $children_male = array_add($children_male, 1, Child::whereBetween('birth_date', [$today->subMonths(6), $today->subMonths(3)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 2, Child::whereBetween('birth_date', [$today->subMonths(9), $today->subMonths(6)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 3, Child::whereBetween('birth_date', [$today->subMonths(12), $today->subMonths(9)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 4, Child::whereBetween('birth_date', [$today->subMonths(18), $today->subMonths(12)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 5, Child::whereBetween('birth_date', [$today->subMonths(48), $today->subMonths(18)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 6, Child::whereBetween('birth_date', [$today->subMonths(72), $today->subMonths(48)])->where('gender', '=', 'male')->count());
        $children_male = array_add($children_male, 7, Child::where('birth_date', '<', $today->subMonths(72))->where('gender', '=', 'male')->count());
        
        $children_female = [0 => Child::whereBetween('birth_date', [$today->subMonths(3), $today])->where('gender', '=', 'female')->count()];
        $children_female = array_add($children_male, 1, Child::whereBetween('birth_date', [$today->subMonths(6), $today->subMonths(3)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 2, Child::whereBetween('birth_date', [$today->subMonths(9), $today->subMonths(6)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 3, Child::whereBetween('birth_date', [$today->subMonths(12), $today->subMonths(9)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 4, Child::whereBetween('birth_date', [$today->subMonths(18), $today->subMonths(12)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 5, Child::whereBetween('birth_date', [$today->subMonths(48), $today->subMonths(18)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 6, Child::whereBetween('birth_date', [$today->subMonths(72), $today->subMonths(48)])->where('gender', '=', 'female')->count());
        $children_female = array_add($children_male, 7, Child::where('birth_date', '<', $today->subMonths(72))->where('gender', '=', 'female')->count());

        $children_unknown = [0 => Child::whereBetween('birth_date', [$today->subMonths(3), $today])->where('gender', '=', '')->count()];
        $children_unknown = array_add($children_male, 1, Child::whereBetween('birth_date', [$today->subMonths(6), $today->subMonths(3)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 2, Child::whereBetween('birth_date', [$today->subMonths(9), $today->subMonths(6)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 3, Child::whereBetween('birth_date', [$today->subMonths(12), $today->subMonths(9)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 4, Child::whereBetween('birth_date', [$today->subMonths(18), $today->subMonths(12)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 5, Child::whereBetween('birth_date', [$today->subMonths(48), $today->subMonths(18)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 6, Child::whereBetween('birth_date', [$today->subMonths(72), $today->subMonths(48)])->where('gender', '=', '')->count());
        $children_unknown = array_add($children_male, 7, Child::where('birth_date', '<', $today->subMonths(72))->where('gender', '=', '')->count());
        
        $toy_total = Toy::count();
        $toys = Toy::select(DB::raw('count(*) as count, age_group_id'))->groupBy('age_group_id')->get();
        
        return view('contents-admin.agegrouplist', compact('children_total', 'children_male', 'children_female', 'children_unknown', 'toy_total', 'toys'));
    }

    public function toypopularity()
    {
        //$toys = Toy::all();
        $toys = Toy::select(DB::raw('id, name, CURDATE() as today, purchased_date, DATEDIFF(CURDATE(), purchased_date) as days'))->get();
        $today = Carbon::now();
        $loans = LoanHistory::select(DB::raw('toy_id, DATEDIFF(IFNULL(returned_date, due_date), issue_date) as days'))->get();
        $loans_latest = LoanHistory::select(DB::raw('count(*) as latestcount, toy_id'))->where('issue_date', '>', $today->subMonths(12))->orwhere('due_date', '>', $today->subMonths(12))->orwhere('returned_date', '>', $today->subMonths(12))->groupBy('toy_id')->get();
        return view('contents-admin.toypopularityreport', compact('toys', 'today', 'loans', 'loans_latest'));
    }

    public function toypurchased()
    {
        $toys = Toy::select(DB::raw('YEAR(purchased_date) as year, count(*) as count'))->groupBy('year')->orderBy('year','asc')->get();
        return view('contents-admin.toyspurchasedperyrreport', compact('toys'));
    }

    public function overduetoys()
    {
        $today = Carbon::now();
        $loanhistories = LoanHistory::where('due_date', '<=', $today)->where('returned_date', '=', null)->get();
        return view('contents-admin.overduetoyslist', compact('today', 'loanhistories'));
    }
}
