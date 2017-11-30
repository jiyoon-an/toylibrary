@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
	<h2>About Us</h2>
	<div class="container-fluid">
		<h3>Welcome!</h3>
		<p>Mt Roskill Multi Ethnic Community Toy Library is a community project of <a href="http://www.migrantactiontrust.org.nz/" target="_blank" style="color:#005c99;">Migrant Action Trust</a>, and established in 2014 to provide quality toys for children up to the age of 8 years.</p>
		<p>We provide a <a href="{{ url('toys') }}" style="color:#005c99;">wide range of toys</a> include doll house, slide, ride-ons, game, puzzle, music, construction, and play set.</p>
		<p>Any parent/ guardian who lives within Auckland can join. Currently we have <a href="{{ url('membership/1') }}" style="color:#005c99;">Annual membership</a> and <a href="{{ url('membership/2') }}" style="color:#005c99;">Party Hire</a> available.</p>
	</div>
	<br/>
	<br/>
	</p>
	
	<div class="container">
		<div id="aboutUsGroupXS" class="hidden-md hidden-lg">
			<div class="col-sm-12">
				<center>
					<img class="rotate" src="img/open.png" alt="Open Hours">
					<h3>Open Hours</h3>
					<br>
					<button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#openHoursXS" data-parent="#aboutUsGroupXS">View Details</button>
					<br>
					<div class="container collapse" id="openHoursXS">
						<div class="col-lg-12">
							<h3>Open Hours</h3>
							<p>Every Friday from 10 am to 12 nn, and 1st and 3rd Saturday of the month from 9:30-11am (except Public Holiday). </p>
							<center><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=2&amp;bgcolor=%23ffcc66&amp;src=mtroskill.toylibrary%40gmail.com&amp;color=%23ff1163&amp;ctz=Pacific%2FAuckland" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></center>
						</div>
					</div>
					<br>
				</center>
			</div>
			<div class="col-sm-12">
				<center>
					<img class="rotate" src="img/location.png" alt="Location">
					<h3>Location</h3>
					<br>
					<button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#locationXS" data-parent="#aboutUsGroupXS">View Details</button>
					<br>
					<div class="container collapse" id="locationXS">
						<div class="col-lg-12">
							<h3>Location</h3>
							<p><a href="https://goo.gl/maps/mHTckPZDRq12" target="_blank" style="color:#005c99;">{{ $libraryinfo->building }}</a>{{ $libraryinfo->no }} {{ $libraryinfo->street }}, {{ $libraryinfo->suburb }}, {{ $libraryinfo->city->name }}, {{ $libraryinfo->country->name }} {{ $libraryinfo->post_code }}</p>
							<div style="overflow:hidden;width:1200px;height:500px;resize:none;max-width:100%;">
								<div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Community+Action+Centre,+766+Sandringham+Rd,+Mt+Roskill,+AUCKLAND&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
								<a class="google-maps-code" href="https://www.dog-checks.com/miniature-schnauzer-checks" id="make-map-data">mini schnauzer checks</a>
							</div>
						</div>
					</div>
					<br>
				</center>
			</div>
			<div class="col-sm-12">
				<center>
					<img class="rotate" src="img/ourteam.png" alt="Our Team">
					<h3>Our Team</h3>
					<br>
					<button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#ourTeamXS" data-parent="#aboutUsGroupXS">View Details</button>
					<br>
					<div class="container collapse" id="ourTeamXS">
						<div class="col-lg-12">
							<h3>Our Team</h3>
							<p>Vina Chen, Project Coordinator</p>
							<p>Evelyn Rivera, Regular Volunteer</p>
							<p>Aiko Nakano, Regular Volunteer </p>
						</div>
					</div>
					<br>
				</center>
			</div>
			<div class="col-sm-12">
				<center>
					<img class="rotate" src="img/membersreview.png" alt="Member's Review">
					<h3>Member's Review</h3>
					<br>
					<button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#membersReviewXS" data-parent="#aboutUsGroupXS">View Details</button>
					<br>
					<div class="container collapse" id="membersReviewXS">
						<div class="col-lg-12">
							<h3>What members say about us</h3>
							<p>“I've recommended the library to those I know in the area. The annual fee is very reasonable. You don't have to volunteer throughout the year and the toys are of good quality and I know that the staff are committed to expanding the selection of toys as the toy library grows.”</p>
							<br/>
							<p>“The staff is always friendly and helpful, great range of toys, we love coming to your toy library : ) ” </p>
							<br/>
							<p>“It is an economic way to get toys. Great people, good prices, and my daughter loves the toys!”</p>
							<br/>
							<p>“Thank you...you are fantastic!! The warm reception from the volunteers, the range of toys, and love a local community initiative.”</p>						
						</div>
					</div>
					<br>
				</center>
			</div>
		</div>
		<div id="aboutUsGroupMD" class="visible-md visible-lg">
			<div class="col-md-3">
				<center><img class="rotate" src="img/open.png" alt="Open Hours"></center>
				<center><h3>Open Hours</h3></center><br>
				<center><button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#openHoursMD" data-parent="#aboutUsGroupMD">View Details</button></center>
			</div>
			<div class="col-md-3">
				<center><img class="rotate" src="img/location.png" alt="Location"></center>
				<center><h3>Location</h3></center><br>
				<center><button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#locationMD" data-parent="#aboutUsGroupMD">View Details</button></center>
			</div>
			<div class="col-md-3">
				<center><img class="rotate" src="img/ourteam.png" alt="Our Team"></center>
				<center><h3>Our Team</h3></center><br>
				<center><button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#ourTeamMD" data-parent="#aboutUsGroupMD">View Details</button></center>
			</div>
			<div class="col-md-3">
				<center><img class="rotate" src="img/membersreview.png" alt="Member's Review"></center>
				<center><h3>Member's Review</h3></center><br>
				<center><button class="btn btn-embossed btn-danger" data-toggle="collapse" data-target="#membersReviewMD" data-parent="#aboutUsGroupMD">View Details</button></center>
			</div>
			<div class="container collapse" id="openHoursMD">
				<div class="col-md-12">
					<h3>Open Hours</h3>
					<p>Every Friday from 10 am to 12 nn, and 1st and 3rd Saturday of the month from 9:30-11am (except Public Holiday). </p>
					<center><iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23ffcc66&amp;src=mtroskill.toylibrary%40gmail.com&amp;color=%23ff1163&amp;ctz=Pacific%2FAuckland" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe></center>
				</div>
			</div>
			<div class="container collapse" id="locationMD">
				<div class="col-md-12">
					<h3>Location</h3>
					<p><a href="https://goo.gl/maps/mHTckPZDRq12" target="_blank" style="color:#005c99;">{{ $libraryinfo->building }}</a>{{ $libraryinfo->no }} {{ $libraryinfo->street }}, {{ $libraryinfo->suburb }}, {{ $libraryinfo->city->name }}, {{ $libraryinfo->country->name }} {{ $libraryinfo->post_code }}</p>					
				    <div style="overflow:hidden;width:1200px;height:500px;resize:none;max-width:100%;">
						<div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Community+Action+Centre,+766+Sandringham+Rd,+Mt+Roskill,+AUCKLAND&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div>
						<a class="google-maps-code" href="https://www.dog-checks.com/miniature-schnauzer-checks" id="make-map-data">mini schnauzer checks</a>
					</div>
				</div>
			</div>
			<div class="container collapse" id="ourTeamMD">
				<div class="col-md-12">
					<h3>Our Team</h3>
					<p>Vina Chen, Project Coordinator</p>
					<p>Evelyn Rivera, Regular Volunteer</p>
					<p>Aiko Nakano, Regular Volunteer </p>
				</div>
			</div>
			<div class="container collapse" id="membersReviewMD">
				<div class="col-md-12">
					<h3>What members say about us</h3>
					<p>“I've recommended the library to those I know in the area. The annual fee is very reasonable. You don't have to volunteer throughout the year and the toys are of good quality and I know that the staff are committed to expanding the selection of toys as the toy library grows.”</p>
					<br/>
					<p>“The staff is always friendly and helpful, great range of toys, we love coming to your toy library : ) ” </p>
					<br/>
					<p>“It is an economic way to get toys. Great people, good prices, and my daughter loves the toys!”</p>
					<br/>
					<p>“Thank you...you are fantastic!! The warm reception from the volunteers, the range of toys, and love a local community initiative.”</p>						
				</div>
			</div>
		</div>		
	</div>
</div>

@endsection