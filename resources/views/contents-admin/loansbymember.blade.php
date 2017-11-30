@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">

    function submitForm(action) {
    	if(action=='editmember') {
    		document.getElementById("_method").value = "get";
    		var id = document.getElementById("member_id").value;
    		document.getElementById('frm_transaction').action = "../memberadmin/"+id+"/edit";
    	} else if(action=='issue') {
    		document.getElementById('frm_transaction').action = "../loansbymember";
    	} else if(action=='edittoy') {
    		document.getElementById("_method").value = "get";
    		var id = document.getElementById("toy_id").value;
    		document.getElementById('frm_transaction').action = "../toyadmin/"+id+"/edit";
    	} else if(action=='submit') {
    		document.getElementById("_method").value = "get";
    		var member_id = document.getElementById("member_id").value;
    		var toy_id = document.getElementById("toy_id").value;
    		var str = location.pathname;
    		if(str == "/loansbymember") {
    			document.getElementById('frm_transaction').action = "../loansbymember/"+member_id+"/"+toy_id;
    		} else {
    			document.getElementById('frm_transaction').action = "../../loansbymember/"+member_id+"/"+toy_id;
    		}
    	}

        document.getElementById('frm_transaction').submit();
    }

</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loans By Member</h1>
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
					<div class="col-lg-4">
						<form id="frm_transaction" method="post" role="form">
							<input id="_method" type="hidden" name="_method" value="post">
                            {{ csrf_field() }}
							<div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" name="member_id" class="form-control">
                                	@if(isset($members) && count($members)>0)
                                		@foreach($members as $member)
                                			@if(isset($currentloans) && count($currentloans)>0)
                                				@if($currentloans->get(0)->member_id === $member->id)
                                					<option value="{{ $member->id }}" selected>{{ $member->id }} : {{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                				@else
													<option value="{{ $member->id }}">{{ $member->id }} : {{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                				@endif
                                			@else
                                				<option value="{{ $member->id }}">{{ $member->id }} : {{ $member->user->first_name }} {{ $member->user->last_name }}</option>
                                			@endif
                                		@endforeach
                                	@else
                                		<option>No Member Data</option>
                                	@endif
                                </select>
								<br/>
								<button onclick="submitForm('editmember')" class="btn btn-default">Edit Member</button>
                            </div>
							<div class="form-group">
                                <label for="toy_id">Toy:</label>
                                <select id="toy_id" name="toy_id" class="form-control">
                                	@if(isset($toys) && count($toys)>0)
                                		@foreach($toys as $toy)
                                			@if(isset($currentloans) && count($currentloans)>0)
                                				@if($currentloans->get(0)->toy_id === $toy->id)
                                					<option value="{{ $toy->id }}" selected>{{ $toy->id }} : {{ $toy->name }}</option>
                                				@else
                                					<option value="{{ $toy->id }}">{{ $toy->id }} : {{ $toy->name }}</option>
                                				@endif
                                			@else
												<option value="{{ $toy->id }}">{{ $toy->id }} : {{ $toy->name }}</option>
                                			@endif
                                		@endforeach
                                	@else
                                		<option>No Toy Data</option>
                                	@endif
                                </select>
								<br/>
								<button onclick="submitForm('issue')" class="btn btn-default">Issue</button>
								<button onclick="submitForm('edittoy')" class="btn btn-default">Edit Toy</button>
								<button onclick="submitForm('submit')" class="btn btn-default">Submit</button>
                            </div>
                        </form>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Other Information</div>
							<div class="panel-body">
								<h4>Transaction Total:</h4>
								<p>
									@if(isset($total_transaction) && $total_transaction->total_transaction!=null)
										$ {{ $total_transaction->total_transaction }}
									@else
										$ -
									@endif
								</p>
								<h4>Bond:</h4>
								<p>
									@if(isset($currentloans) && count($currentloans)>0)
										@if($currentloans->get(0)->member->outstanding_bonds != null)
											$ {{ $currentloans->get(0)->member->outstanding_bonds }}
										@else
											$ -
										@endif
									@else
										$ -
									@endif
								</p>
								<h4>Balance Carried Forward:</h4>
								<p>
									@if(isset($bcf) && $bcf->bcf!=null)
										$ {{ $bcf->bcf }}
									@else
										$ -
									@endif
								</p>
								<h4>Fines/Refunds:</h4>
								<p>
									@if(isset($finerefund) && $finerefund->finerefund!=null)
										$ {{ $finerefund->finerefund }}
									@else
										$ -
									@endif
								</p>
								<h4>Payments Made:</h4>
								<p>
									@if(isset($payment) && $payment->payment!=null)
										$ {{ $payment->payment }}
									@else
										$ -
									@endif
								</p>
								<h4>Total Due:</h4>
								<p>
									<?php
										$balance = 0;
										$finerefunds = 0;
										$payments = 0;

										if(isset($bcf) && $bcf->bcf!=null) {
											$balance = $bcf->bcf;
										}

										if(isset($finerefund) && $finerefund->finerefund!=null) {
											$finerefunds = $finerefund->finerefund;
										}

										if(isset($payment) && $payment->payment!=null) {
											$payments = $payment->payment;
										}
										$total = $balance + $finerefunds - $payments;
										echo "$ ".$total;
									?>
								</p>
								<button class="btn btn-default">Add Transaction</button>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Current Loans</div>
							<div class="panel-body">
								<div class="table-responsive">
                                	<table class="table table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>Toy</th>
	                                            <th>Loan Type</th>
	                                            <th>Pieces</th>
	                                            <th>Due Date</th>
												<th>Reissues</th>
												<th>Fee</th>
												<th>Actions</th>
	                                        </tr>
	                                    </thead>
		                                <tbody>
		                                	@if(isset($currentloans) && count($currentloans)>0)
		                                		@foreach($currentloans as $loanhistory)
		                                			<tr>
		                                				<td>{{ $loanhistory->toy->id }} : {{ $loanhistory->toy->name }}</td>
		                                				<td>{{ $loanhistory->toy->loan_type->name }}</td>
		                                    			<td>1 of {{ $loanhistory->quantity }}</td>
		                                    			<td>{{ date('m d, Y', strtotime($loanhistory->due_date)) }}</td>
		                                    			<td>@if($loanhistory->reissues_remaining===null || $loanhistory->reissues_remaining==='') 0 @else {{ $loanhistory->reissues_remaining }} @endif</td>
		                                    			<td>$ {{ $loanhistory->cost }}</td>
		                                    			<td>
		                                    				<div class="btn-group">
																<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
																	Select
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="#">
		                                                                    <form action="{{ url('/loansbymember/return/'.$loanhistory->id) }}" method="post">
		                                                                        <input type="hidden" name="_method" value="PUT">
		                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                                                        <button type="submit" style="background:none; border:none;padding:0px">Return Toy</button>
		                                                                    </form>
		                                                                </a>
																	</li>
																	<li><a href="#">
		                                                                    <form action="{{ url('/loansbymember/reissue/'.$loanhistory->id) }}" method="post">
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
	                                    			<td colspan="7" style="text-align: center">No Loan Data</td>
	                                    		</tr>
	                                    	@endif
		                                </tbody>
                                	</table>
            					</div>
            				</div>
        				</div>
						<div class="panel panel-default">
							<div class="panel-heading">New Loans</div>
							<div class="panel-body">
								<div class="table-responsive">
                                	<table class="table table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>Toy</th>
	                                            <th>Loan Type</th>
	                                            <th>Pieces</th>
	                                            <th>Due Date</th>
												<th>Reissues</th>
												<th>Fee</th>
												<th>Actions</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	@if(isset($newloans) && count($newloans)>0)
		                                		@foreach($newloans as $loanhistory)
		                                			<tr>
		                                				<td>{{ $loanhistory->toy->id }} : {{ $loanhistory->toy->name }}</td>
		                                				<td>{{ $loanhistory->toy->loan_type->name }}</td>
		                                    			<td>1 of {{ $loanhistory->quantity }}</td>
		                                    			<td>{{ date('m d, Y', strtotime($loanhistory->due_date)) }}</td>
		                                    			<td>@if($loanhistory->reissues_remaining===null || $loanhistory->reissues_remaining==='') 0 @else {{ $loanhistory->reissues_remaining }} @endif</td>
		                                    			<td>{{ $loanhistory->cost }}</td>
		                                    			<td>
		                                    				<div class="btn-group">
																<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
																	Select
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="#">
		                                                                    <form action="{{ url('/loansbymember/return/'.$loanhistory->id) }}" method="post">
		                                                                        <input type="hidden" name="_method" value="PUT">
		                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                                                        <button type="submit" style="background:none; border:none;padding:0px">Return Toy</button>
		                                                                    </form>
		                                                                </a>
																	</li>
																	<li><a href="#">
		                                                                    <form action="{{ url('/loansbymember/reissue/'.$loanhistory->id) }}" method="post">
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
	                                    			<td colspan="7" style="text-align: center">No Loan Data</td>
	                                    		</tr>
	                                    	@endif
	                                    </tbody>
                                	</table>
            					</div>
							</div>
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