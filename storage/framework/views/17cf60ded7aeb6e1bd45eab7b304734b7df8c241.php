<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.sponsor.name.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else {
            return true;
        }
    }
</script>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sponsor</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add Sponsor
                            <?php elseif($func==='edit'): ?>
                                Edit Sponsor
                            <?php else: ?>
                                Sponsor Details
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
                                        <form name="sponsor" action="../../sponsoradmin" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="sponsor" action="../../sponsoradmin/<?php echo e($sponsor->id); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="sponsor" action="../../sponsoradmin" method="get" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="sponsor" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
									<div class="form-group">
                                        <label for="name">Sponsor Name</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="name" class="form-control">
                                            <?php else: ?>
                                                <input name="name" class="form-control" value="<?php echo e($sponsor->name); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="name" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter sponsor name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="start_date" class="form-control">
                                            <?php else: ?>
                                                <input name="start_date" class="form-control" value="<?php echo e(date('m d, Y', strtotime($sponsor->start_date))); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="start_date" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter start date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="end_date" class="form-control">
                                            <?php else: ?>
                                                <input name="end_date" class="form-control" value="<?php echo e(date('m d, Y', strtotime($sponsor->end_date))); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="end_date" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter end date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="image">Sponsor Logo</label>
                                        <input name="image" type="file">
										<p class="help-block">Browse sponsor logo.</p>
                                    </div>
									<div class="form-group">
                                        <label for="website">Sponsor website</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="website" class="form-control">
                                            <?php else: ?>
                                                <input name="website" class="form-control" value="<?php echo e($sponsor->website); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="website" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter sponsor's website here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="note">Note</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <textarea name="note" class="form-control" rows="4"></textarea> 
                                            <?php else: ?>
                                                <textarea name="note" class="form-control" rows="4"><?php echo e($sponsor->note); ?></textarea> 
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea name="note" class="form-control" rows="4"></textarea> 
                                        <?php endif; ?>
                                    </div>
									<div class="form-group">
                                        <label for="is_enabled">Is this sponsor enabled?</label>
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