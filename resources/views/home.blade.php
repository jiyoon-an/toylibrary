@extends('layouts.library')

@section('content')
<!-- Start of Content -->
  
@if (Session::has('success'))
<div style="background-color:#9999FF">
    <div class="container">        
        <div class="alert alert-success" style="background:#00b300; border-color:#009900; margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}</div>
    </div>
</div>
@endif
@if (Session::has('failed'))
<div style="background-color:#9999FF">
    <div class="container">   
        <div class="alert alert-danger" style="margin-top:20px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('failed') }}</div>
    </div>
</div>
@endif

<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">

    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('../img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <div data-p="225.00" style="display: none;">
            <img data-u="image" src="../img/toys1.jpg" />                
        </div>
        <div data-p="225.00" style="display: none;">
            <img data-u="image" src="../img/toys2.jpg" />
        </div>
        <div data-p="225.00" data-po="80% 55%" style="display: none;">
            <img data-u="image" src="../img/toys3.jpg" />
        </div>
        <a data-u="add" href="http://www.jssor.com" style="display:none">Jssor Slider</a>
    </div>

    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>

    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora22l" style="background: url('img/arrow_left.png') center center no-repeat !important; top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora22r" style="background: url('img/arrow_right.png') center center no-repeat !important; top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
</div>
&nbsp
<div class="container">  
    <div class="container-fluid"" style="text-align: center;">
        <h3>Welcome to our toy library!</h3><br>
    </div>
    <div class="row">
        <div class="row">    
            <div class="col-sm-4 wow fadeInDown text-center">
                <img class="rotate" src="img/icon/heart.svg" alt="Generic placeholder image">
                <h3>About Us</h3>
                <p class="lead">Toy library is a place where you can go to borrow a large variety of toys. </p>
                <p><a class="btn btn-embossed btn-danger view" href="{{ url('/aboutus') }}" role="button">Find out more</a></p>
            </div>        
            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="rotate" src="img/icon/retina.svg" alt="Generic placeholder image">
                <h3>Join Us</h3>
                <p class="lead">Any parent/ guardian who lives within Auckland can join.</p>
                <p><a class="btn btn-embossed btn-primary view" href="{{ url('/membership') }}" role="button">Join us now</a></p>
            </div>        
            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="rotate" src="img/icon/picture.svg" alt="Generic placeholder image">
                <h3>Toys</h3>
                <p class="lead">We provide a wide range of quality and affordable toys. </p>
                <p><a class="btn btn-embossed btn-info view" role="button" href="{{ url('/toys') }}">View toys</a></p>
            </div>
        </div>    
        <br>    
        <div class="container-fluid"" style="text-align: center;">     
            <p>We have the <a href="{{ url('membership/1') }}" style="color:#005c99;">Annual membership</a> and <a href="{{ url('membership/2') }}" style="color:#005c99;">Party Hire</a> available for the parent/ guardian who live within Auckland.</p>
        </div>
    </div>
</div>

@endsection
