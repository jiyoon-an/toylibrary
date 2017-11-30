@extends('layouts.library')

@section('content')
<!-- Start of Content -->
 <div class="container">
    <h2>Toys</h2>
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
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" data-slide="prev">
                            
                        </a>
                        <a class="right carousel-control" data-slide="next">
                            
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                @foreach ($toys as $toy)
                <div class="col-sm-4 col-lg-4 col-md-4" style="min-height: 450px !important; max-height: 450px !important;">
                    <div class="thumbnail">
                        <img src="{{ '../img/toys/'.$toy->image }}" alt="Toy Image">
                        <div class="caption">
                            <h4 class="pull-right">${{ number_format($toy->loan_type->loan_price, 2) }}</h4>
                            <h4><a href="{{ url('/toy-item/'.$toy->id) }}" style="color:#005c99;">{{ $toy->name }}</a></h4>
                            <h4>{{ $toy->quantity }} stock total</h4>
                            {{ $toy->loan_type->name }}<br>
                            Toy Group: {{ $toy->toy_group->toy_group }}<br>
                            Age Group: {{ $toy->age_group->name }}<br>                            
                            Loan Duration: {{ $toy->loan_type->note }}<br>
                        </div>
                        <div class="text-right">
                            <form action="{{ 'toys/'.$toy->id }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                Qty: <input type="number" name="quantity" value="1" min="1" style="width:50px;">
                                <input class="btn btn-success" type="submit" name="submit" value="Add to Cart">
                            </form>
						</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->

@endsection