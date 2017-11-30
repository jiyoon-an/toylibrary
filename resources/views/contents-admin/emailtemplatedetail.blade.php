@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Email Template</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Template
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
										<div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter title here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Subject</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter subject here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Body</label>
                                            <textarea class="form-control" rows="4"></textarea>	
                                        </div>								
									
										<a type="submit" class="btn btn-success">Submit</a>
									</form>
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