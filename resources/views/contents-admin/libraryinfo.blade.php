@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library Details</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
										<h2>Library Name:</h2>
										<h3>{{ $libraryinfo->name }}</h3>
										<h2>Address</h2>
										<h3>
											{{ $libraryinfo->no }} {{ $libraryinfo->building }} {{ $libraryinfo->street }}<br/>
											{{ $libraryinfo->suburb }}<br/>
											{{ $libraryinfo->city->name }}
										</h3>
										<h2>Email:</h2>
										<h3>{{ $libraryinfo->email }}</h3>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>

										<a href="{{ url('/libraryinfo/'.$libraryinfo->id.'/edit') }}" class="btn btn-primary btn-lg btn-block">Edit</a>
									</div>
									
									<div class="col-lg-6">
										<h2>Country:</h2>
										<h3>{{ $libraryinfo->country->name }}</h3>
										<h2>Phone:</h2>
										<h3>{{ $libraryinfo->phone}}</h3>
										<h2>Website</h2>
										<h3>http://www.mtroskilltoylibrary.org.nz</h3>
										<h2>Logo: </h2>
										<h3>
											<img src="{{ '../img/logos/'.$libraryinfo->image }}"/>
										</h3>
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