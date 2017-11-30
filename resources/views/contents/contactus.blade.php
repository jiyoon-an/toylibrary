@extends('layouts.library')

@section('content')
<!-- Start of Content -->

<div class = "container">
    <h2>Contact Us</h2>
	<form>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>First Name</label>
					<input class="form-control"></input>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control"></input>
				</div>
			</div>		
			<div class="col-lg-6">
				<div class="form-group">
					<label>Last Name</label>
					<input class="form-control"></input>
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input class="form-control"></input>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label>Subject</label>
					<input class="form-control"></input>
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea class="form-control" rows="3"></textarea>
				</div>
				<button class="btn btn-success pull-right">Submit</button>
			</div>
		</div>
	</form>
</div>

@endsection