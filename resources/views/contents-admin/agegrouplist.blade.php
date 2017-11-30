@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Age Groups</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Age Groups List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Age Group</th>
                                                <th>Children</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Toys</th>
                                                <th></th>
                
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>Male</th>
                                                <th>Female</th>
                                                <th>Unknown</th>
                                                <th>Total</th>
                                                <th>Percent</th>
                                                <th>Total</th>
                                                <th>Percent</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($toys) && count($toys)>0)
                                                @foreach ($toys as $count=>$toy)
                                                    <tr>
                                                        <td>{{ $toy->age_group->name }}</td>
                                                        <td>{{ array_get($children_male, $count) }}</td>
                                                        <td>{{ array_get($children_female, $count) }}</td>
                                                        <td>{{ array_get($children_unknown, $count) }}</td>
                                                        <td>{{ array_get($children_male, $count) + array_get($children_female, $count) + array_get($children_unknown, $count) }}</td>
                                                        @if($children_total===0)
                                                            <td>0 %</td>
                                                        @else
                                                            <td>{{ (array_get($children_male, $count) + array_get($children_female, $count) + array_get($children_unknown, $count)) * 100 / $children_total }} %</td>
                                                        @endif
                                                        <td>{{ $toy->count }}</td>
                                                        <td>{{ $toy->count / $toy_total * 100 }} %</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" style="text-align: center;">No Age Group Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col-lg-12(nested) -->
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