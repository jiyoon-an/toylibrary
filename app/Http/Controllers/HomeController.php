<?php

namespace App\Http\Controllers;

use Cart;
use Carbon\Carbon;
use App\LibraryInfo;
use App\AgeGroup;
use App\ToyGroup;
use App\LoanType;
use App\Toy;
use App\User;
use App\Membership;
use App\News;
use App\Transaction;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
    	$libraryinfo = LibraryInfo::all()->first();
        return view('home', compact('libraryinfo'));
    }

	/**
     * Show the about us
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
    	$libraryinfo = LibraryInfo::all()->first();
    	return view('contents.aboutus', compact('libraryinfo'));    	
    }

	/**
     * Show the toy
     *
     * @return \Illuminate\Http\Response
     */
    public function toys()
    {
    	$libraryinfo = LibraryInfo::all()->first();
        $agegroups = AgeGroup::all();
        $toygroups = ToyGroup::all();
        $loantypes = LoanType::all();
        $toys = Toy::where('quantity', '>', 0)->where('status', 'LOAN')->get();
    	return view('contents.toys', compact('libraryinfo', 'agegroups', 'toygroups', 'loantypes', 'toys'));    	
    }

    /**
     * Show the toy
     *
     * @return \Illuminate\Http\Response
     */
    public function addtocart(Request $request, Toy $toy)
    {
        $libraryinfo = LibraryInfo::all()->first();
        $toys = Toy::where('quantity', '>', 0)->where('status', 'LOAN')->get();

        $quantity = Input::get('quantity');
        Cart::add($toy->id, $toy->name, $quantity, $toy->loan_type->loan_price, ['image' => $toy->image, 'loan_type' => $toy->loan_type->name]);

        return view('contents.shoppingcart', compact('libraryinfo'));        
    }

    /**
     * Show the toy item
     *
     * @return \Illuminate\Http\Response
     */
    public function showtoyitem(Toy $toy)
    {
        $libraryinfo = LibraryInfo::all()->first();
        $agegroups = AgeGroup::all();
        $toygroups = ToyGroup::all();
        $loantypes = LoanType::all();
        return view('contents.toyitem', compact('libraryinfo', 'agegroups', 'toygroups', 'loantypes', 'toy'));        
    }

    /**
     * Show the shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function shoppingcart()
    {
        $libraryinfo = LibraryInfo::all()->first();
        return view('contents.shoppingcart', compact('libraryinfo'));      
    }

    /**
     * Update item in shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function updatecart($rowId)
    {
        $quantity = 'quantity_'.$rowId;
        Cart::update($rowId, ['qty' => Input::get($quantity)]);

        $libraryinfo = LibraryInfo::all()->first();
        return view('contents.shoppingcart', compact('libraryinfo'));      
    }

    /**
     * Remove item in shopping cart
     *
     * @return \Illuminate\Http\Response
     */
    public function removeincart($rowId)
    {
        Cart::remove($rowId);

        $libraryinfo = LibraryInfo::all()->first();
        return view('contents.shoppingcart', compact('libraryinfo'));      
    }

	/**
     * Show the membership
     *
     * @return \Illuminate\Http\Response
     */
    public function membership()
    {
    	$libraryinfo = LibraryInfo::all()->first();
        $memberships = Membership::where('is_enabled', 1)->get();
    	return view('contents.membership', compact('libraryinfo', 'memberships'));    	
    }

	/**
     * Show the news
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
    	$libraryinfo = LibraryInfo::all()->first();
        $news = News::all();
    	return view('contents.news', compact('libraryinfo', 'news'));    	
    }

	/**
     * Show the news entry
     *
     * @return \Illuminate\Http\Response
     */
    public function newsentry()
    {
    	$libraryinfo = LibraryInfo::all()->first();
    	return view('contents.newsentry', compact('libraryinfo'));    	
    }

	/**
     * Show the donation
     *
     * @return \Illuminate\Http\Response
     */
    public function donation()
    {
    	$libraryinfo = LibraryInfo::all()->first();
    	return view('contents.donation', compact('libraryinfo'));    	
    }

	/**
     * Show the contact us
     *
     * @return \Illuminate\Http\Response
     */
    public function contactus()
    {
    	$libraryinfo = LibraryInfo::all()->first();
    	return view('contents.contactus', compact('libraryinfo'));    	
    }

    /**
     * Show the acheck-out page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {        
        $total = $request->input('total');

        $libraryinfo = LibraryInfo::all()->first();

        $transaction = new Transaction;

        $transaction->member_id = 1;
        $transaction->transaction_date = Carbon::now();
        $transaction->details = 'For Admin Confimation';
        $transaction->type = 'LOAN';
        $transaction->debit = $total;

        $transaction->save();

        return view('contents.checkout', compact('libraryinfo'));
    }

    /**
     * Show the acheck-out page.
     *
     * @return \Illuminate\Http\Response
     */
    public function memberprofile()
    { 
        $libraryinfo = LibraryInfo::all()->first();
        $user = User::where('id', 1)->get();
        return view('contents.memberprofile', compact('libraryinfo', 'user'));  
    }
    
}
