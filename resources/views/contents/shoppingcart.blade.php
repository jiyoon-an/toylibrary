@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
    <div class="row">
    	<h2>Shopping Cart</h2>
        <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"><h3>Product</h3></th>
                        <th class="text-center"><h3>Quantity</h3></th>
                        <th class="text-center"><h3>Price</h3></th>
                        <th class="text-center"><h3>Total</h3></th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    </tr>
                	@foreach(Cart::content() as $item)
                    <tr>
                        <td class="col-sm-6 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"><img class="media-object" src="{{ '../img/toys/'.$item->options->image }}" style="width: 72px; height: 72px;"></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{ $item->name }}</a></h4>
                                <h5 class="media-heading">{{ $item->options->loan_type }}</h5>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1 text-center">
                        	<!-- <input type="number" class="form-control" name="quantity_{{ $item->rowid }}" value="{{ $item->qty }}"> -->
                        	<h4>{{ $item->qty }}</h4>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><h4>${{ number_format($item->price, 2) }}</h4></td>
                        <td class="col-sm-1 col-md-1 text-center"><h4>${{ number_format($item->total, 2) }}</h4></td>
                        <td class="col-sm-3 col-md-3 text-center">
	                        <!-- <a class="btn btn-primary" href="{{ url('shoppingcart/update_item='.$item->rowId) }}">
	                            <span class="glyphicon glyphicon-refresh"></span> Update
	                        </a> -->
	                        <a class="btn btn-danger" href="{{ url('shoppingcart/remove_item='.$item->rowId) }}">
	                            <span class="glyphicon glyphicon-remove"></span> Remove
	                        </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    	<td><hr></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td><h4>Subtotal</h4></td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h4><strong>${{ Cart::subtotal() }}</strong></h4></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h3><strong>${{ Cart::total() }}</strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
	            <button type="button" class="btn btn-info" >
	               	<a href="{{ url('toys') }}" style="text-decoration:none"> <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
	            </button>
                <form class="cd-form" role="form" method="POST" action="{{ url('checkout') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="total" value="{{ Cart::total() }}">
                    <input class="full-width has-padding" type="submit" value="Checkout">
    	        </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->

@endsection