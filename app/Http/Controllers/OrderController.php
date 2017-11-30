<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('contents-admin/orders', compact('orders'));
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
        $orders = Order::leftjoin('loan_histories', 'orders.loan_history_id', '=', 'loan_histories.id')->leftjoin('members', 'loan_histories.member_id', '=', 'members.id')->leftjoin('users', 'members.user_id', '=', 'users.id')->where(function ($query) use ($search) {
                $query->where('users.first_name', 'like', '%'.$search.'%')
                      ->orwhere('users.last_name', 'like', '%'.$search.'%')
                      ->orwhere('orders.order_number', 'like', '%'.$search.'%')
                      ->orwhere('orders.status', 'like', '%'.$search.'%');
        })->get();
        return view('contents-admin.orders', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('contents-admin.orderdetails', compact('order'));
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
        $order = Order::find($id);

        $order->status = Input::get('status');
        $order->modified_by = Auth::user();
        $order->save();

        return Redirect::to('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        return view('contents-admin/orderdetails');
    }
}
