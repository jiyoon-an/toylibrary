@extends('layouts.library')

@section('content')
<!-- Start of Content -->

<div class="container">
	<h2>{{ $toy->name }}</h2>
    <div class="row">
		<div class="col-md-3">
            <p class="lead">Toy Library</p>
            <div class="panel-group" id="toycategory">
                <div class="panel panel-default">
                    <div class="list-group-item">
                        <h4 class="panel-title">
                            <a href="#">All Toys</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="list-group-item">
                        <h4 class="panel-title">
                            <a style="cursor:pointer;" data-toggle="collapse" data-parent="#toycategory" data-target="#toygroup" >By Toy Group</a>
                      </h4>
                    </div>
                    <div id="toygroup" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($toygroups as $toygroup)
                                    <li>- <a href="{{ url('toys/toygroup/'.$toygroup->id) }}">{{ $toygroup->toy_group }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="list-group-item">
                        <h4 class="panel-title">
                            <a style="cursor:pointer;" data-toggle="collapse" data-parent="#toycategory" data-target="#agegroup">By Age Group</a>
                        </h4>
                    </div>
                    <div id="agegroup" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($agegroups as $agegroup)
                                    <li>- <a href="{{ url('toys/agegroup/'.$agegroup->id) }}">{{ $agegroup->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="list-group-item">
                        <h4 class="panel-title">
                            <a style="cursor:pointer;" data-toggle="collapse" data-parent="#toycategory" data-target="#loantype">By Loan Type</a>
                        </h4>
                    </div>
                    <div id="loantype" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($loantypes as $loantype)
                                    <li>- <a href="{{ url('toys/loantype/'.$loantype->id) }}">{{ $loantype->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="list-group-item">
                        <h4 class="panel-title">
                            <a href="#">Party Hire Exclusive</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-lg-10 col-lg-offset-1">
                <img class="img-responsive" src="{{ '../img/toys/'.$toy->image }}" alt="Toy Image">
                <div class="caption-full">
                    <h4 class="pull-right">${{ number_format($toy->loan_type->loan_price, 2) }} {{ $toy->loan_type->note }}</h4>
                    <h3>{{ $toy->brand }}</h3>
                    <h5>{{ $toy->quantity }} stock total</h5>
                    <p>{{ $toy->loan_type->name }}</p>
                    <p>Toy Group: {{ $toy->toy_group->toy_group }}</p>
                    <p>Age Group: {{ $toy->age_group->name }}</p>
                    <div class="col-lg-10 col-lg-offset-1">
	                    <div class="panel panel-primary">
	                    	<div class="panel-heading">
	                    		<p>Description:</p>
	                    	</div>
	                    	<div class="panel-body" style="text-align:justify;">
	                    		<p>{{ $toy->description }}</p>
	                    	</div>
	                    </div>
	                	@if (count($toy->toy_pieces) > 0)
		                	<div class="col-lg-8 col-lg-offset-2">
			                	<h4>Toy Piece/s:</h4>
			                	<ul class="list-group">
			                    	@foreach ($toy->toy_pieces as $toy_piece)
			                    		<li class="list-group-item">
			                    			<p class="pull-right">Piece/s: {{ $toy_piece->quantity }}</p>
			                    			<h5>- {{ $toy_piece->name }}</h5>
			                    		</li>
			                    	@endforeach
			                	</ul>
		                	</div>
	                	@endif
		                <div class="col-lg-12">
			                <div class="text-right">
			                	<a href="{{ url('toys') }}" class="btn btn-danger pull-right">Back</a>                    
			                    <form action="{{ 'toys/'.$toy->id }}" method="post" enctype="multipart/form-data">
			                        {{ csrf_field() }}
			                        Qty: <input type="number" name="quantity" value="1" min="1" style="width:80px;">&nbsp;
			                        <input class="btn btn-success" type="submit" name="submit" value="Add to Cart">&nbsp;&nbsp;
			                    </form>
			                </div>
		                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End of Content -->
@endsection