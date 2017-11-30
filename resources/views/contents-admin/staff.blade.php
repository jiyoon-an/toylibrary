@extends('layouts.admin')

@section('content')
<!-- Start of Content -->
<script type="text/javascript">
	var user_id="";

	function tempUserId(userid) {
		user_id = userid;
	}

	function select(functype) {
		if(functype=='add') {
			location.href = "/staff/add"
		} else if(functype=='edit') {
			if(user_id=="") {
				alert("Select Staff first");
			} else {
				location.href = "/staff/"+user_id+"/edit";	
			}
		} else {
			if(user_id=="") {
				alert("Select Staff First");
			} else {
				location.href = "/staff/"+user_id+"/delete";	
			}
		}
	}

	function search() {
		var text = document.getElementById("search").value;
		location.href = "/staff/"+text;
	}

	function checkvalidation() {
		var username = document.staff.username.value;
        var first_name = document.staff.first_name.value;
        var phone = document.staff.phone.value;
        var email = document.staff.email.value;

        if(username=="" || username==null) {
            alert("Please enter the username.");
            return false;
        } else if(first_name=="" || first_name==null) {
            alert("Please enter the first_name.");
            return false;
        } else if(phone=="" || phone==null) {
            alert("Please enter the phone.");
            return false;
        } else if(email=="" || email==null) {
            alert("Please enter the email.");
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
            <h1 class="page-header">Staff</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Staff List and Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
								<div class="input-group custom-search-form">
									<input type="text" id="search" class="form-control" placeholder="Search..." value="">
                                	<span class="input-group-btn">
		                                <button class="btn btn-default" type="button" onclick="search()">
		                                    <i class="fa fa-search"></i>
		                                </button>
                            		</span>
                            	</div>
								<br/>
								<div class="col-lg-4">
                                    <button id="btnAdd" class="btn btn-success btn-block" onclick="select('add')">Add</button>
								</div>
								<div class="col-lg-4">
								<button id="btnEdit" class="btn btn-info btn-block" onclick="select('edit')">Edit</button>
								</div>
								<div class="col-lg-4">
								<button id="btnDelete" class="btn btn-danger btn-block" onclick="select('delete')">Delete</button>
								</div>
								<br/>
								<div class="table-responsive">
								
								</div>
								<table class="table table-hover">
									<thead>
										<tr>
											<td>Username</td>
											<td>Name</td>
											<td>Access Level</td>
										</tr>
									</thead>
									<tbody>
										@if(isset($staffs) && count($staffs)>0)
											@foreach ($staffs as $staff)
											<tr>
												<td onclick="tempUserId('{{ $staff->id }}')">{{ $staff->username }}</td>
												<td onclick="tempUserId('{{ $staff->id }}')">{{ $staff->first_name }} {{ $staff->last_name }}</td>
												<td onclick="tempUserId('{{ $staff->id }}')">{{ $staff->access->name }}</td>
											</tr>
											@endforeach
										@else
											<tr>
												<td colspan="3" style="text-align: center;">No Staff Data</td>
											</tr>
										@endif
									</tbody>
								</table>
								
                            </div>
							<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										@if(!empty($func))
											@if($func==='add')
												Add Details
											@elseif($func==='edit')
												Edit Details
											@else($func==='delete')
												Delete Details
											@endif
										@else
											Details
										@endif
									</div>
									<div class="panel-body">
										@if (!empty($func))
											@if ($func==='add')
												<form name="staff" action="../../staff" method="post" onsubmit="return checkvalidation()">
											@elseif ($func==='edit')
												<form name="staff" action="../../staff/{{ $result->id }}" method="post" onsubmit="return checkvalidation()">
												{{ method_field('put') }}
											@else
												<form name="staff" action="../../staff/{{ $result->id }}" method="post" onsubmit="return checkvalidation()">
												{{ method_field('delete')}}
											@endif
											{{ csrf_field() }}
										@else
											<form name="staff" method="post" role="form" onsubmit="return checkvalidation()">
											{{ csrf_field() }}
										@endif
											<div class="form-group">
												<label for="username">Username:</label>
												@if(!empty($func))
													@if($func==='add')
														<input id="username" name="username" class="form-control">
													@else
														<input id="username" name="username" class="form-control" value="{{ $result->username }}">
													@endif
												@else
													<input id="username" name="username" class="form-control">
												@endif
												<p class="help-block">Enter username here.</p>
											</div>
											<div class="form-group">
												<label for="first_name">Name:</label>
												@if(!empty($func))
													@if($func==='add')
														<input id="first_name" name="first_name" class="form-control">
													@else
														<input id="first_name" name="first_name" class="form-control" value="{{ $result->first_name }}">
													@endif
												@else
													<input id="first_name" name="first_name" class="form-control">
												@endif
												<p class="help-block">Enter name here.</p>
											</div>
											<div class="form-group">
												<label for="phone">Phone Number:</label>
												@if(!empty($func))
													@if($func==='add')
														<input id="phone" name="phone" class="form-control">
													@else
														<input id="phone" name="phone" class="form-control" value="{{ $result->phone }}">
													@endif
												@else
													<input id="phone" name="phone" class="form-control">
												@endif
												<p class="help-block">Enter phone number here.</p>
											</div>
											<div class="form-group">
												<label for="email">Email Address:</label>
												@if(!empty($func))
													@if($func==='add')
														<input id="email" name="email" class="form-control">
													@else
														<input id="email" name="email" class="form-control" value="{{ $result->email }}">
													@endif
												@else
													<input id="email" name="email" class="form-control">
												@endif
												<p class="help-block">Enter email here.</p>
											</div>
											<div class="form-group">
												<label for="note">Comments:</label>
												@if(!empty($func))
													@if($func==='add')
														<textarea name="note" class="form-control" rows="4"></textarea>	
													@else
														<textarea name="note" class="form-control" rows="4">{{ $result->note }}</textarea>	
													@endif
												@else
													<textarea name="note" class="form-control" rows="4"></textarea>	
												@endif
												<p class="help-block">Enter comments here.</p>
											</div>
											<div class="form-group">
												<label for="access_id">Access Level:</label>
												<select name="access_id" class="form-control">
													@if(!empty($func))
														@if($func==='add')
															@foreach($accesses as $access)
																<option value="{{ $access->id }}">{{ $access->name }}</option>
															@endforeach
														@else
															@foreach($accesses as $access)
																@if($access->id === $result->access_id)
																	<option value="{{ $access->id }}" selected>{{ $access->name }}</option>
																@else
																	<option value="{{ $access->id }}">{{ $access->name }}</option>
																@endif
															@endforeach	
														@endif
													@else
														@foreach($accesses as $access)
															<option value="{{ $access->id }}">{{ $access->name }}</option>
														@endforeach	
													@endif
												</select>
												<p class="help-block">Enter access level here.</p>
											</div>
											<div class="form-group">
												<label for="contact_person">Contact Person:</label>
												@if(!empty($func))
													@if($func==='add')
														<input name="contact_person" class="form-control">
													@else
														<input name="contact_person" class="form-control" value="{{ $result->contact_person }}">
													@endif
												@else
													<input name="contact_person" class="form-control">
												@endif
												<p class="help-block">Enter contact person here.</p>
											</div>	
											<button type="submit" class="btn btn-default">Submit</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</form>
									</div>
								</div>
							</div>                                
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
</div>

@endsection