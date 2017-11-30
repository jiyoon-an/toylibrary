<div class="pull-right">	
	@if (Auth::check())
		<a class="btn" href="{{ url('/shoppingcart') }}" style="font-family: 'Baloo Da', Arial, sans-serif;"><h4><span class="glyphicon glyphicon-user"></span> Member's Profile</h4></a>
	@endif
	<a class="btn" href="{{ url('/shoppingcart') }}" style="font-family: 'Baloo Da', Arial, sans-serif;"><h4><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h4></a>
</div>
<!-- Preloader -->
<div id="preloader">
	<div id="status"></div>
</div>

<!-- Display Header -->
<div style="background-color:#9999FF">
	<div class="jumbotron container" style="margin-bottom:0px; background-color:#9999FF">
		<a class="page-scroll" href="/">
			<div class="container">
				<row>
					<div class="col-lg-3 col-md-12 col-xs-12" style="margin-bottom: 0 !important; display: table-cell; vertical-align: bottom;">
						<center><img class="img-fluid" src="{{ URL::asset('img/logo.png') }}" alt="Toy Library"/></center>
					</div>
					<div class="col-lg-9 col-md-12 col-xs-12">
						<br><br>
						<center><h1>{{ $libraryinfo->name }}</h1></center>
					</div>
				</row>
			</div>	
		</a>
	</div>
</div>	

<!-- NavBar -->
<nav class="navbar-default" role="navigation" style="background-color: #9999FF">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- <a class="navbar-brand" href="index.php" style="font-family: 'Baloo Da', Arial, sans-serif;">Home</a> -->
		</div>
		
		<div class="collapse navbar-collapse nav-justified navbar-ex1-collapse" style="border-width:0px;">
			<ul class="nav nav-justified menu">
				<li class="menuItem" style = "background-color: #F44336"><a href="{{ url('/aboutus') }}">About Us</a></li>
				<li class="menuItem" style = "background-color: #FF6F00"><a href="{{ url('/toys') }}">Toys</a></li>
				<li class="menuItem" style = "background-color: #FED201"><a href="{{ url('/membership') }}">Membership</a></li>
				<li class="menuItem" style = "background-color: #00E676"><a href="{{ url('/news') }}">News</a></li>
				<li class="menuItem" style = "background-color: #00B0FF"><a href="{{ url('/donation') }}">Donation</a></li>
				<li class="menuItem" style = "background-color: #2962FF"><a href="{{ url('/contactus') }}">Contact Us</a></li>
				@if (Auth::guest())
					<li class="menuItem" style = "background-color: #8E24AA"><a class="cd-signin" href="{{ url('/login') }}">Login</a></li>
				@else
					<li class="menuItem" style = "background-color: #8E24AA"><a href="{{ url('/logout') }}">Logout</a></li>
				@endif
			</ul>
		</div>	  
	</div>
</nav>
