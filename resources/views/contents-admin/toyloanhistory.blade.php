@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy Loan History</h1>
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
						<form action="/loanhistory" method="post" role="form">
                        {{ csrf_field() }}
							<div class="form-group">
                                <label for="toy">Toy</label>
                                <select name="toy" id="toy" class="form-control">
                                    @if(isset($toys) && count($toys)>0)
                                        @foreach ($toys as $toy)
                                            @if(isset($loanhistories))
                                                @if(count($loanhistories)>0)
                                                    @if($toy->id === $loanhistories->get(0)->toy_id)
                                                        <option value="{{ $toy->id }}" selected>{{ $toy->name }}</option>
                                                    @else
                                                        <option value="{{ $toy->id }}">{{ $toy->name }}</option>
                                                    @endif
                                                @else
                                                    <option value="{{ $toy->id }}">{{ $toy->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $toy->id }}">{{ $toy->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">No Toy Data</option>
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
							<div class="form-group">
                                <label for="returned">Last Checked:</label>
                                <input name="returned" id="returned" class="form-control" placeholder="Enter last checked date here." vale="">
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
                                        <th>Member</th>
                                        <th>Due Date</th>
                                        <th>Returned Date</th>
										<th>Fine<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($loanhistories) && count($loanhistories)>0)
                                        @if(count($loanhistories)>0)
                                            @foreach ($loanhistories as $loanhistory)
                                                <tr>
                                                    <td>{{ date('m d, Y', strtotime($loanhistory->issue_date)) }}</td>
                                                    <td>{{ $loanhistory->member->user->first_name }} {{ $loanhistory->member->user->last_name }}</td>
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