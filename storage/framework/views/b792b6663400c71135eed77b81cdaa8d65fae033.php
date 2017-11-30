<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Email Configuration</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Configuration
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
										
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">New Member Email 1
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Overdue Loan Email
                                                </label>
                                            </div>
		
											<div class="form-group">
                                            <label>Overdue Loan Email Delay (days)</label>
                                            <input type="number" class="form-control">
                                            <p class="help-block">Enter amount of days here.</p>
											</div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Membership Expiry Email
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Roster Change Email
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Roster Reminder Email
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Holiday Email
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Admin Hold Notification Email
                                                </label>
                                            </div>
											
											
											<div class="form-group">
                                            <label>Child Birthday Message</label>
                                            <textarea class="form-control" rows="4"></textarea>	
                                        </div>
									
										<a class="btn btn-success">Save</a>
										<a class="btn btn-danger">Cancel</a>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>