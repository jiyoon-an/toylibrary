@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function search() {
        var text = document.getElementById("search").value;
        location.href = "/order/"+text;
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order List</h1>
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
                                            <th>Order No.</th>
                                            <th>Member ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($orders) && count($orders)>0)
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $order->loan_history->member_id }} : {{ $order->loan_history->member->user->first_name }} {{ $order->loan_history->member->user->last_name }} </td>
                                                    <td>{{ date('m d, Y', strtotime($order->loan_history->issue_date)) }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs" onclick="location.href='../order/{{ $order->id }}/edit'">
                                                                Details
                                                            </button>
                                                        </div>      
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Order Data</td>
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
				<div class="row">
                </div>
            </div>	
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
        
@endsection