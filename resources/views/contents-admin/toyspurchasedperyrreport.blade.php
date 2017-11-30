@extends('layouts.adminmain')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kids Report</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
    		<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Report                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
						<div class="col-lg-12">
							<p>Note that this report assumes that the parents of these children are toy library members who are not resigned nor locked. This report represents a total of NNN kids (N of whom do not have a recorded date of birth), which belong to NNN distinct families.</p>
						</div>
                        <div class="col-lg-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Toys Purchased</th>                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($toys) && count($toys)>0)
                                            @foreach($toys as $toy)
                                                <tr>
                                                    <td>{{ $toy->year }}</td>
                                                    <td>{{ $toy->count }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2" style="text-align: center;">No Toy Data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
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