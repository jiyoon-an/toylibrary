@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
	<h3>Member Profile</h3>
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="#basicInformation" data-toggle="pill">Basic Information</a></li>
		<li><a href="#address" data-toggle="pill">Address</a></li>
	</ul>
	<div class="tab-content" style="border-width:0px">
	<!--start basic information-->
	<div id="basicInformation" class="tab-pane fade in active">
		<h3>Username:</h3>
		<p>{{ $user->username }}</p>
		<h3>First Name:</h3>
		<p>{{ $user->first_name }}</p>
		<h3>Last Name:</h3>
		<p>{{ $user->last_name }}</p>
		<a class="btn btn-warning" href="{{ url('password/reset') }}">Change Password</a>
	</div>
	<!--start address-->
	<div id="address" class="tab-pane fade">
		<h3>Address</h3>
                                    <form role="form">
                                        <div class="form-group">
                                            <label>House/Apt Number</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter house/apartment number here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Building</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter building here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Street</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter street here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Suburb</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter suburb here.</p>
                                        </div>
										<div class="form-group">
                                            <label>City</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
											<p class="help-block">Select city.</p>
                                        </div>
										<div class="form-group">
                                            <label>Post code</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter post code here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
											<p class="help-block">Select country.</p>
                  </div>
				<button class="btn btn-primary">Update address</button>
            </form>
		</div>
	</div>
</div>
@endsection