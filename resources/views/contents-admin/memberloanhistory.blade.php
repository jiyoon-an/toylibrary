@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members Loan History</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> History                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="col-lg-6">
						<form action="/memberloanhistory" method="post" role="form">
                        {{ csrf_field() }}
							<div class="form-group">
                                <label for="member">Member</label>
                                <select name="member" class="form-control">
                                    @if(isset($members) && count($members)>0)
                                        @foreach ($members as $member)
                                            @if(isset($loanhistories))
                                                @if(count($loanhistories)>0)
                                                    @if($member->id === $loanhistories->get(0)->member_id)
                                                        <option value="{{ $member->id }}" selected>{{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                                    @else
                                                        <option value="{{ $member->id }}">{{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $member->id }}">{{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $member->id }}">{{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">No Member Data</option>
                                    @endif
                                </select>
                            </div>
							<div class="form-group">
                                <label for="from" >From Date:</label>
                                <input name="from" id="from" class="form-control" placeholder="Enter  date here." value="">
                            </div>
                            <div class="form-group">
                                <label for="to">To Date:</label>
                                <input name="to", id="to" class="form-control" placeholder="Enter date here." vale="">
                            </div>
							<button type="submit" class="btn btn-default">Submit Button</button>
						</form>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Issued Date</th>
                                        <th>Toy</th>
                                        <th>Due Date</th>
                                        <th>Returned Date</th>
										<th>Fine<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($loanhistories))
                                        @if(count($loanhistories)>0)
                                            @foreach ($loanhistories as $loanhistory)
                                                <tr>
                                                    <td>{{ date('m d, Y', strtotime($loanhistory->issue_date)) }}</td>
                                                    <td>{{ $loanhistory->toy->name }}</td>
                                                    <td>{{ date('m d, Y', strtotime($loanhistory->due_date)) }}</td>
                                                    <td>{{ date('m d, Y', strtotime($loanhistory->returned_date)) }}</td>
                                                    <td>$ {{ $loanhistory->cost }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Data</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
                <!-- /.panel-body -->
            </div>                
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
        
@endsection