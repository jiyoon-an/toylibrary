<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.loantype.name.value;
        var loan_price = document.loantype.loan_price.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(loan_price=="" || loan_price==null) {
            alert("Please enter the loan price.");
            return false;
        } else if(!isFinite(loan_price)) {
            alert("Please enter the number in loan_price");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loan Type</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add Loan Type
                            <?php elseif($func==='edit'): ?>
                                Edit Loan Type
                            <?php else: ?>
                                Loan Type Details
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
                                        <form name="loantype" action="../../loantype" method="post" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="loantype" action="../../loantype/<?php echo e($loantype->id); ?>" method="post" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="loantype" action="../../loantype" method="get" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="loantype" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
									<div class="form-group">
                                        <label for="name">Loan Type Name</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="name" class="form-control">
                                            <?php else: ?>
                                                <input name="name" class="form-control" value="<?php echo e($loantype->name); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="name" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter loan type name here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="loan_price">Price</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="loan_price" class="form-control">
                                            <?php else: ?>
                                                <input name="loan_price" class="form-control" value="<?php echo e($loantype->loan_price); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="loan_price" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter loan type name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="note">Note</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <textarea name="note" class="form-control" rows="4"></textarea>
                                            <?php else: ?>
                                                <textarea name="note" class="form-control" rows="4"><?php echo e($loantype->note); ?></textarea>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea name="note" class="form-control" rows="4"></textarea>
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