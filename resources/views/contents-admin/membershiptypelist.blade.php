@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
	function search() {
		var text = document.getElementById("search").value;
		location.href = "/membershipadmin/"+text;
	}
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Membership Type List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> List                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">					
					<div class="input-group custom-search-form">
                        <input type="text" id="search" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick="search()">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>							
                    <div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
	                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Membership Type</th>
                                            <th>Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($memberships) && count($memberships)>0)
                                        	@foreach ($memberships as $membership)
                                        		<tr>
                                        			<td>{{ $membership->name }}</td>
    												<td>$ {{ $membership->fee }}</td>
    												<td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                Select
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li><a href="{{ url('/membershipadmin/'.$membership->id.'/edit') }}">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <form action="{{ url('/membershipadmin/'.$membership->id) }}" method="post">
                                                                            <input type="hidden" name="_method" value="delete">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <button type="submit" style="background:none; border:none;padding:0px">Delete</button>
                                                                        </form>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div> 
                                                    </td>
                                        		</tr>
                                        	@endforeach
                                        @else
                                            <tr>
                                                <td colspan="3", style="text-align: center;">No Membership Data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
								<a class="btn btn-success" href="{{ url('/membershipadmin/add') }}">Add Membership Type</a>
                            </div>
						</div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>        
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
        
@endsection