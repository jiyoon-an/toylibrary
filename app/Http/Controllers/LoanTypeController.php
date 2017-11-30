<?php

namespace App\Http\Controllers;

use App\LoanType;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class LoanTypeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loantypes = LoanType::all();
        return view('contents-admin.loantypelist', compact('loantypes'));
    }

    public function addloantype()
    {   
        $func = 'add';
        return view('contents-admin.loantype', compact('func'));
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
        $loantype = new LoanType;

        $loantype->name = Input::get('name');
        $loantype->loan_price = Input::get('loan_price');
        $loantype->note = Input::get('note');
        $loantype->modified_by = Auth::user();

        $loantype->save();

        return Redirect::to('loantype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $loantypes = LoanType::where('name', 'like', '%'.$search.'%')->get();
        return view('contents-admin.loantypelist', compact('loantypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loantype = LoanType::find($id);
        $func = 'edit';
        return view('contents-admin.loantype', compact('loantype', 'func'));
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
        $loantype = LoanType::find($id);

        $loantype->name = Input::get('name');
        $loantype->loan_price = Input::get('loan_price');
        $loantype->note = Input::get('note');
        $loantype->modified_by = Auth::user();

        $loantype->save();

        return Redirect::to('loantype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LoanType::find($id)->delete();
        return Redirect::to('loantype');
    }
}
