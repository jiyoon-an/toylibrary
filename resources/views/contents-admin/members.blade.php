@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var username = document.member.username.value;
        var password = document.member.password.value;
        var email = document.member.email.value;
        var access_id = document.member.access_id.value;

        if(username=="" || username==null) {
            alert("Please enter the username.");
            return false;
        } else if(password=="" || password==null) {
            alert("Please enter the password.");
            return false;
        } else if(email=="" || email==null) {
            alert("Please enter the email.");
            return false;
        } else if(access_id=="" || access_id==null) {
            alert("Please select the access level.");
            return false;
        } else if(email.indexOf('@') =-1) {
            alert("Please check email address again.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Information</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form name="member" action="../../memberadmin/{{ $member->id }}" method="post" onsubmit="return checkvalidation()">
                                {{ method_field('put') }}
                                {{ csrf_field() }}    
								<h1>Basic Information</h1>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" class="form-control" value="{{ $member->user->username }}">
                                    <p class="help-block">Enter username here.</p>
                                </div>
								<div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" value="{{ $member->user->password }}">
                                    <p class="help-block">Enter password here.</p>
                                </div>
								<div class="form-group">
                                    <label for="confirm_password">Repeat Password</label>
                                    <input name="confirm_password" type="password" class="form-control" value="{{ $member->user->password }}">
                                    <p class="help-block">Enter password again.</p>
                                </div>
								<div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input name="first_name" class="form-control" value="{{ $member->user->first_name }}">
                                    <p class="help-block">Enter first name here.</p>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input name="last_name" class="form-control" value="{{ $member->user->last_name }}">
                                    <p class="help-block">Enter last name here.</p>
                                </div>
								<div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control" value="{{ $member->user->email }}">
                                    <p class="help-block">Enter e-mail address here.</p>
                                </div>
								<div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" class="form-control" value="{{ $member->user->phone }}">
                                    <p class="help-block">Enter phone number here.</p>
                                </div>
								<div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input name="mobile" class="form-control" value="{{ $member->user->mobile }}">
                                    <p class="help-block">Enter mobile phone number here.</p>
                                </div>
								<div class="form-group">
                                    <label for="note">Notes</label>
                                    <textarea name="note" class="form-control" rows="3">{{ $member->user->note }}</textarea>
                                </div>
								<div class="form-group">
                                    <label for="access_id">Access ID</label>
                                    <select name="access_id" class="form-control">
                                        @foreach($accesses as $access)
                                            @if($access->id === $member->user->access_id)
                                                <option value="{{ $access->id }}" selected>{{ $access->name }}</option>
                                            @else
                                                <option value="{{ $access->id }}">{{ $access->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Is this user active?</label>
                                    <div class="checkbox">
                                        <label for="is_active">
                                            @if($member->user->is_active === 1)
                                            <input name="is_active" type="checkbox" value="1" checked>Active
                                            @else
                                                <input name="is_active" type="checkbox" value="1">Active
                                            @endif
                                        </label>
                                    </div>
								</div>
								<div class="form-group">
                                    <label for="outstanding_bonds">Outstanding bonds</label>
                                    @if($member->outstanding_bonds === null)
                                        <input name="outstanding_bonds" class="form-control" value="">
                                    @else
                                        <input name="outstanding_bonds" class="form-control" value="$ {{ $member->outstanding_bonds }}">
                                    @endif
                                    <p class="help-block">Enter outstanding bonds here.</p>
                                </div>
                                
                                <button type="submit" class="btn btn-default">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
								<a href="{{ url('/memberadmin') }}"class="btn btn-default">Back</a>
                            
                        </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>Address</h1>
                                    
                                        <div class="form-group">
                                            <label for="no">House/Apt Number</label>
                                            <input name="no" class="form-control" value="{{ $member->user->no }}">
                                            <p class="help-block">Enter house/apartment number here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="building">Building</label>
                                            <input name="building" class="form-control" value="{{ $member->user->building }}">
                                            <p class="help-block">Enter building here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="street">Street</label>
                                            <input name="street" class="form-control" value="{{ $member->user->street }}">
                                            <p class="help-block">Enter street here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="suburb">Suburb</label>
                                            <input name="suburb" class="form-control" value="{{ $member->user->suburb }}">
                                            <p class="help-block">Enter suburb here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="city_id">City</label>
                                            <select name="city_id" class="form-control">
                                                @foreach($cities as $city)
                                                    @if($city->id === $member->user->city_id)
                                                        <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                                    @else
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
											<p class="help-block">Select city.</p>
                                        </div>
										<div class="form-group">
                                            <label for="post_code">Post code</label>
                                            <input name="post_code" class="form-control" value="{{ $member->user->post_code }}">
                                            <p class="help-block">Enter post code here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="country_id">Country</label>
                                            <select class="form-control" name="country_id">
                                                @if(isset($country))
                                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                                @endif
                                            </select>
											<p class="help-block">Select country.</p>
                                        </div>
                                    
                                    <h1>Emergency Contact Information</h1>
                                    
                                        <div class="form-group">
                                            <label for="contact_person">Contact person</label>
                                            <input name="contact_person" class="form-control" value="{{ $member->user->contact_person }}">
                                            <p class="help-block">Enter contact person name here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="contact_mobile">Contact person mobile number</label>
                                            <input name="contact_mobile" class="form-control" value="{{ $member->user->contact_mobile }}">
                                            <p class="help-block">Enter contact person's mobile number here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="contact_email">Contact person email address</label>
                                            <input name="contact_email" class="form-control" value="{{ $member->user->contact_email }}">
                                            <p class="help-block">Enter contact person's e-mail address here.</p>
                                        </div>
										
                                    </form>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


@endsection