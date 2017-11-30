<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.membership.name.value;
        var fee = document.membership.fee.value;
        var period = document.membership.period.value;
        var end_date = document.membership.end_date.value;
        var archive_period = document.membership.archive_period.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(fee=="" || fee==null) {
            alert("Please enter the fee.");
            return false;
        } else if(period=="" || period==null) {
            alert("Please enter the period.");
            return false;
        } else if(end_date=="" || end_date==null) {
            alert("Please enter the end date.");
            return false;
        } else if(archive_period=="" || archive_period==null) {
            alert("Please enter the archive_period.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Membership Type</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add Membership Type
                            <?php elseif($func==='edit'): ?>
                                Edit Membership Type
                            <?php else: ?>
                                Membership Type Details
                            <?php endif; ?>
                        <?php else: ?>
                            Details
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(!empty($func)): ?>
                                    <?php if($func==='add'): ?>
                                        <form name="membership" action="../../membershipadmin" method="post" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="membership" action="../../membershipadmin/<?php echo e($membership->id); ?>" method="post" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="membership" action="../../membershipadmin" method="get" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="membership" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
									<div class="form-group">
                                        <label for="name">Membership Name</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="name" class="form-control">
                                            <?php else: ?>
                                                <input name="name" class="form-control" value="<?php echo e($membership->name); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="name" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="fee">Membership Fee</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="fee" class="form-control">
                                            <?php else: ?>
                                                <input name="fee" class="form-control" value="<?php echo e($membership->fee); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="fee" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership fee here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="period">Membership Period</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="period" class="form-control">
                                            <?php else: ?>
                                                <input name="period" class="form-control" value="<?php echo e($membership->period); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="period" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">Membership End Date</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="end_date" class="form-control">
                                            <?php else: ?>
                                                <input name="end_date" class="form-control" value="<?php echo e($membership->end_date); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="end_date" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership end date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="expiry_grace_period">Membership Expiry Grace Period</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="expiry_grace_period" class="form-control">
                                            <?php else: ?>
                                                <input name="expiry_grace_period" class="form-control" value="<?php echo e($membership->expiry_grace_period); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="expiry_grace_period" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership expiry grace period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="archive_period">Membership Archive Period</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="archive_period" class="form-control">
                                            <?php else: ?>
                                                <input name="archive_period" class="form-control" value="<?php echo e($membership->archive_period); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="archive_period" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter membership archive period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="outstanding_balance_warning">Outstanding Balance Warning</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="outstanding_balance_warning" class="form-control">
                                            <?php else: ?>
                                                <input name="outstanding_balance_warning" class="form-control" value="<?php echo e($membership->outstanding_balance_warning); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="outstanding_balance_warning" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter outstanding balance warning here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="is_enabled">Is this membership enabled?</label>
                                        <div class="checkbox">
                                            <label>
                                                <input name="is_enabled" type="checkbox" value="1">Enabled
                                            </label>
                                        </div>
									</div>
									<button type="submit" class="btn btn-default">Submit</button>
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