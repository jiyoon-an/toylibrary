@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
	<h2>Who can join? </h2>
	<p>Any parent/ guardian who lives within Auckland can join. We will require an ID and proof of address. Membership will be approved on first come first serve basis. </p>
	&nbsp
	
	&nbsp
	
	&nbsp
	<div class="container">
		<div id="membershipGroup">
			@foreach ($memberships as $membership)
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $membership->name }}</h3>
						</div>
						<div class="panel-body">
							<h2 style="margin-top:5px;">${{ number_format($membership->fee, 2) }} / year</h2>
							<ul>
								<li>Bond: {{ $membership->minimum_bond == $membership->maximum_bond ? "$".number_format($membership->minimum_bond, 2) : "$".number_format($membership->minimum_bond, 2)." - $".number_format($membership->maximum_bond, 2) }}</li>
								<li>Admin Fee: {{ $membership->admin_fee == 0 ? "NOT APPLICABLE" : "$".number_format($membership->admin_fee) }}</li>
								<li>May borrow up to {{ $membership->toys_quantity }} toys at a time.</li>
								<li>May borrow up to {{ $membership->gold_star_toys_quantity }} gold star toys at a time.</li>
								<li>{{ $membership->note }}</li>
								<br>
								<li>
									<button class="btn btn-info" data-toggle="collapse" data-target="{{ $membership->data_target }}" data-parent="#membershipGroup">Learn more</button>
									<button class="btn btn-danger" style="margin-left:10px;" onclick="window.location='{{ url('/register/'.$membership->id) }}'">Register</button>
								</li>
							</ul>
						</div>
					</div>
				</div>	
            @endforeach	
			<div class="accordion-group">
				<div class="container collapse" id="annualMembershipRules">
					<div class="col-lg-12">
						<center><h4>Rules of Annual Membership</h4></center>
						<p style="font-weight:bold">About the Toy Library</p>
						<p>Mt Roskill Multi Ethnic Community Toy Library is a community service run by volunteers, and established to provide good quality toys for children up to the age of 8 years.</p>
						<p style="font-weight:bold">Who can join?</p>
						<p>Any parent/ guardian can join. We will require an ID and proof of address. Membership will be approved on first come first serve basis.</p>
						<p style="font-weight:bold">When is the Library open?</p>
						<p>Every Friday from 10 am to 12 nn, and Every 1st and 3rd Saturday of the month 9:30am-11am. We are closed during the public holidays, and any exception closing days will be advised.</p>
						<p style="font-weight:bold">Membership Fee and Bond</p>
						<p>There is an annual membership fee of $10 and $100 Bond1. The bond will be refunded2 when the family member decides to stop membership. We operate on a cash only basis at the library. Please bring sufficient cash, or you can make a online payment to our ASB bank account 12 - 3077 - 0509589 - 00 with reference of ToyMXXX (<u>replace “XXX” with your membership number</u>). Please notify us after you making the online payment.</p>
						<p style="font-weight:bold">Borrowing toys</p>
						<ul class="list-unstyled">
							<li>As a principle, borrowing of toys is on a first come, first served basis.</li>
							<li>Kindly present your membership card whenever you borrow or return toys.</li>
							<li>Each member is responsible to check toys at the time of borrowing. (If any piece is missing or damaged please speak to the person on duty or librarian).</li>
							<li>Each member is responsible to ensure that toys are age appropriate.</li>
							<li>Each member may borrow the toys for up to two weeks.</li>
							<li>Each member may borrow up to 3 toys at anytime; and no more than 1 gold starred toy at anytime.</li>
							<li>To give chance to other families, a loaned gold starred toy cannot be renewed consecutively.</li>
							<li>Blue, silver and green starred toys can be renewed consecutively up to 4 weeks.</li>
						</ul>		
						<table class="table-bordered">
							<tr>
								<td></td>
								<td>Rental fee (for 2 weeks per toy)</td>
							</tr>
							<tr>
								<td>Gold star (any toy ≥ $170)</td>
								<td>$5</td>
							</tr>
							<tr>
								<td>Silver star (any toy between $70 - $170)</td>
								<td>$2</td>
							</tr>
							<tr>
								<td>Blue star (any toy &lt; $170)</td>
								<td>$1</td>
							</tr>
							<tr>
								<td>Green star (Donated toy)</td>
								<td>$0.50</td>
							</tr>
						</table>
						<br/>
						<center><a href="" style="color:blue" data-toggle="modal" data-target="#annualModal"><h4>Read the Terms and Conditions for Annual Membership</h4></a>
						<a href="{{ asset('files/RulesofAnnualMembership2016.pdf') }}" target="_blank"><button class="btn btn-success"><h4>Download PDF</h4></button></a></center>
						@include('termsandconditions.annual')
					</div>
				</div>
				<div class="container collapse" id="partyHireRules">
					<div class="col-lg-12">
						<center><h4>Rules of Party Hire</h4></center>
						<p style="font-weight:bold">About the Toy Library</p>
						<p>Mt Roskill Multi Ethnic Community Toy Library is a community service run by volunteers, and established to provide good quality toys for children up to the age of 8 years.</p>
						<p style="font-weight:bold">Who can hire toys?</p>
						<p>Any parent/ guardian can hire. We will require a valid ID and proof of address (e.g. Current driver's license and power or telephone bill dated within the last 3 months).</p>
						<p style="font-weight:bold">Collection &amp; return times</p>
						<p><u>Collection:</u> Every Friday 10am - 4pm, or Every 1st and 3rd Saturday of the month 9:30am-11am<br/>
						<u>Return:</u> Every Monday or Friday 10am - 4pm<br/>
						Please note, we are closed during the public holidays, and any exception closing days will be advised.
						</p>
						<p style="font-weight:bold">Party Hire Fee and Bond</p>
						<p>There is a $2 admin fee and $200 Bond. The bond will be refunded1 when the toys are returned and relevant fees are paid. We operate on a <u>cash only</u> basis at the library. Please bring sufficient cash. Your booking is secured only after we received the admin fee and bond. Cancellation of pre-booked items is required five working days prior to the issue date, otherwise $10 booking fee will be deducted from the bond.</p>
						<table class="table-bordered">
							<tr>
								<td></td>
								<td>Hire fee per weekend<br/><b>(Fri - Mon)</b></td>
								<td>Hire fee per week<br/><b>(Fri - Fri)</b></td>
							</tr>
							<tr>
								<td>Gold star (any toy ≥ $170)</td>
								<td>$7</td>
								<td>$10</td>
							</tr>
							<tr>
								<td>Silver star (any toy between $70 - $170)</td>
								<td>$3</td>
								<td>$4</td>
							</tr>
							<tr>
								<td>Blue star (any toy &lt; $170)</td>
								<td>$1.5</td>
								<td>2</td>
							</tr>
							<tr>
								<td>Green star (Donated toy)</td>
								<td>$0.50</td>
								<td>$1</td>
							</tr>
							<tr>
								<td>Kids Foldable Table (H 50 x W 61 x L 122cm)</td>
								<td>$10</td>
								<td>$15</td>
							</tr>
							<tr>
								<td>Kids Plastic Stackable Arm Chair (blue/orange)</td>
								<td>$0.50</td>
								<td>$1</td>
							</tr>
						</table>
						&nbsp
						<p style="font-weight:bold">How many toys can be borrowed?</p>
						<p>You may borrow up to 5 toys, no more than 3 gold star toys. Currently we have 3 kids’ tables, 13 blue and 13 orange kids’ chairs in stock, you may borrow as many as tables and chairs that available at the time.</p>
						<p style="font-weight:bold">Checking Toys</p>
						<p>When you are in the library please be aware that each toy is packed and checked in its own bags or boxes. It would be appreciated that you keep each toy in this condition. You are responsible to check toys’ condition and completeness at the time of borrowing. If any piece is missing or damaged please speak to the person on duty or librarian immediately.</p>
						<p style="font-weight:bold">Overdue toys</p>
						<p>Overdue toys will incure a fine.</p>
						<table class="table-bordered">
							<tr>
								<td>Toy</td>
								<td>Overdue fee</td>
							</tr>
							<tr>
								<td>Gold star (any toy ≥ $170)</td>
								<td>$3/day</td>
							</tr>
							<tr>
								<td>Silver star (any toy between $70 - $170)</td>
								<td>$1/day</td>
							</tr>
							<tr>
								<td>Blue star (any toy &lt; $170)</td>
								<td>$0.50/day</td>
							</tr>
							<tr>
								<td>Green star (Donated toy)</td>
								<td>$0.20/day</td>
							</tr>
							<tr>
								<td>Kids Foldable Table (H 50 x W 61 x L 122cm)</td>
								<td>$4/day</td>
							</tr>
							<tr>
								<td>Kids Plastic Stackable Arm Chair (blue/orange)</td>
								<td>$0.20/day</td>
							</tr>
						</table>
						<br/>
						<center><a href="" style="color:blue" data-toggle="modal" data-target="#partyhireModal"><h4>Read the Terms and Conditions for Party Hire</h4></a>
						<a href="{{ asset('files/RulesofPartyHire2016.pdf') }}" target="_blank"><button class="btn btn-success"><h4>Download [PDF]</h4></button></a></center>
						@include('termsandconditions.partyhire')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection