@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
	function search() {
		var text = document.getElementById("search").value;
		location.href = "/allloans/"+text;
	}
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Loans</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Loans                    
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
                                            <th>Toy</th>
                                            <th>Issued To</th>
                                            <th>Issued By</th>
                                            <th>Issue Date</th>
											<th>Due Date</th>
											<th>Reissues</th>
											<th>Fee</th>
											<th>Overdue Fine</th>
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($loanhistories) && count($loanhistories)>0)
                                        	@foreach($loanhistories as $loanhistory)
                                        		<tr>
                                        			<td>{{ $loanhistory->toy->id }} : {{ $loanhistory->toy->name }}</td>
                                        			<td>{{ $loanhistory->member_id }} : {{$loanhistory->member->user->first_name }} {{ $loanhistory->member->user->last_name }}</td>
                                        			<td>{{ $loanhistory->modified_by }}</td>
                                        			<td>{{ date('m d, Y', strtotime($loanhistory->issue_date)) }}</td>
                                        			<td>{{ date('m d, Y', strtotime($loanhistory->due_date)) }}</td>
                                        			<td>
                                                        @if($loanhistory->reissues_remaining===null)
                                                            0
                                                        @else
                                                            {{ $loanhistory->reissues_remaining }}
                                                        @endif</td>
                                        			<td>$ {{ $loanhistory->cost }}</td>
                                        			<td>-</td>
                                        			<td>
                                        				<div class="btn-group">
    														<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
    															Select
    															<span class="caret"></span>
    														</button>
    														<ul class="dropdown-menu pull-right" role="menu">
    															<li><a href="#">
                                                                        <form action="{{ url('/allloans/return/'.$loanhistory->id) }}" method="post">
                                                                            <input type="hidden" name="_method" value="PUT">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <button type="submit" style="background:none; border:none;padding:0px">Return Toy</button>
                                                                        </form>
                                                                    </a>
    															</li>
    															<li><a href="#">
                                                                        <form action="{{ url('/allloans/reissue/'.$loanhistory->id) }}" method="post">
                                                                            <input type="hidden" name="_method" value="PUT">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <input type="hidden" name="reissue" value="{{ $loanhistory->reissues_remaining }}">
                                                                            <button type="submit" style="background:none; border:none;padding:0px">Reissue Toy</button>
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
                                                <td colspan="9" style="text-align: center;">No Loan Data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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