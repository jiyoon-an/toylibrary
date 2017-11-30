@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members Transaction History</h1>
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
						<form action="/membertransactionhistory" method="post" role="form">
                        {{ csrf_field() }}
							<div class="form-group">
                                <label for="member">Member</label>
                                <select name="member" class="form-control">
                                    @if(isset($members) && count($members)>0)
                                        @foreach ($members as $member)
                                            @if(isset($transactions))
                                                @if(count($transactions)>0)
                                                    @if($member->id === $transactions->get(0)->member_id)
                                                        <option value="{{ $member->id }}" selected>{{ $member->user->username }}</option>
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
							<div class="form-group input-group">
								<input type="text" id="disabledInput" placeholder="$0.00" class="form-control" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-money"></i>
                                    </button>
                                </span>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Details</th>
                                        <th>Staff</th>
                                        <th>Credit</th>
										<th>Debit<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($transactions) && count($transactions)>0)
                                        @if(count($transactions)>0)
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td>{{ date('m d, Y', strtotime($transaction->transaction_date)) }}</td>
                                                    <td>{{ $transaction->details }}</td>
                                                    <td>
                                                        @if($transaction->staff_id === 0)
                                                            Admin
                                                        @else
                                                            {{ $transaction->member->user->first_name }} {{ $transaction->member->user->last_name }}
                                                        @endif
                                                    </td>
                                                    <td>$ {{ $transaction->credit }}</td>
                                                    <td>$ {{ $transaction->debit }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Transaction Data</td>
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