@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Announcements</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Announcements List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
	                                <table class="table table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>Title</th>
	                                            <th>Message</th>
	                                            <th>Start Date</th>
	                                            <th>End Date</th>
												<th>Is Enabled</th>
												<th>Action</th>											
											</tr>
	                                    </thead>
	                                    <tbody>
	                                    	@if(isset($announcements) && count($announcements)>0)
			                                    @foreach ($announcements as $announcement)
			                                    	<tr>
			                                    		<td>{{ $announcement->title }}</td>
			                                    		<td>{{ $announcement->message }}</td>
			                                    		<td>{{ date('m d, Y', strtotime($announcement->start_date)) }}</td>
			                                    		<td>{{ date('m d, Y', strtotime($announcement->end_date)) }}</td>
			                                    		<td>@if($announcement->is_enabled === 1) Y @else N @endif</td>
			                                    		<td>
															<div class="btn-group">
																<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
																	Select
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="{{ url('/announcement/'.$announcement->id.'/edit') }}">Edit</a>
																	</li>
																	
																	<li>
																		<a href="#">
																			<form action="{{ url('/announcement/'.$announcement->id) }}" method="post">
																			    <input type="hidden" name="_method" value="DELETE">
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
				                            		<td colspan="6" style="text-align: center;">No Announcement Data</td>
				                            	</tr>
				                            @endif
	                                    </tbody>
                                	</table>
                            	</div>
                            </div>
                            <!-- /.col-lg-12(nested) -->
                        </div>
                        <!-- /.row (nested) -->
						<a href="{{ url('/announcement/add') }}" class="btn btn-success btn-block">Add New 	Announcement</a>
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