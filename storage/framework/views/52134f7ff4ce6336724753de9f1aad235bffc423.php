<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var type = document.donation.type.value;
        var details = document.donation.details.value;

        if(type=="" || type==null) {
            alert("Please enter the type.");
            return false;
        } else if(details=="" || details==null) {
            alert("Please enter the details.");
            return false;
        } else {
            return true;
        }

    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Donations</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add Donation
                            <?php elseif($func==='edit'): ?>
                                Edit Donation
                            <?php else: ?>
                                Donation Details
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
                                        <form name="donation" action="../../donationadmin" method="post" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="donation" action="../../donationadmin/<?php echo e($donation->id); ?>" method="post" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="donation" action="../../donationadmin" method="get" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="donation" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
                                    <div class="form-group">
                                        <label for="type">Donation</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="type" class="form-control">
                                            <?php else: ?>
                                                <input name="type" class="form-control" value="<?php echo e($donation->type); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="type" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter donation here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Description</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <textarea name="details" class="form-control" rows="4"></textarea> 
                                            <?php else: ?>
                                                <textarea name="details" class="form-control" rows="4"><?php echo e($donation->details); ?></textarea> 
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea name="details" class="form-control" rows="4"></textarea> 
                                        <?php endif; ?>
                                        
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