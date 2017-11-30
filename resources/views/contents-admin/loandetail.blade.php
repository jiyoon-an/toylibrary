@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loan Detail</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Loan Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
										<div class="form-group">
                                            <label>Loan Type</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Membership ID</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
										</div>
										<div class="form-group">
                                            <label>Loan Period</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter loan period here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Loan Cost</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter loan cost here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Overdue Grace Period</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter overdue grace period here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Overdue Cost</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter overdue cost here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Missing Piece Fine </label>
                                            <input class="form-control">
                                            <p class="help-block">Enter overdue cost here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Missing Piece Refund</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter missing piece refund here.</p>
                                        </div>
										
											
                                        
									<button type="submit" class="btn btn-default">Submit</button>
									</div>
									
									<!-- /.col-lg-6(nested) -->
									<div class="col-lg-6">
										<div class="form-group">
                                            <label>Reissue Period</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter reissue period here.</p>
                                        </div>
									
										<div class="form-group">
                                            <label>Reissues Allowed</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter number of reissues allowed here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Hold Period</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter hold period here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Hold Cost</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter hold cost here.</p>
                                        </div>
										<div class="form-group">
                                            <label>Bond Cost</label>
                                            <input class="form-control">
                                            <p class="help-block">Enter bond cost here.</p>
                                        </div>
									</form>
									</div>
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