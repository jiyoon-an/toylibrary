<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var toy_group = document.toygroup.toy_group.value;

        if(toy_group=="" || toy_group==null) {
            alert("Please enter the toy group.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy Group</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add Toy Group
                            <?php elseif($func==='edit'): ?>
                                Edit Toy Group
                            <?php else: ?>
                                Toy Group Details
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
                                        <form name="toygroup" action="../../toygroup" method="post" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="toygroup" action="../../toygroup/<?php echo e($toygroup->id); ?>" method="post" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="toygroup" action="../../toygroup" method="get" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="toygroup" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
									<div class="form-group">
                                        <label for="toy_group">Toy Group</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="toy_group" class="form-control">
                                            <?php else: ?>
                                                <input name="toy_group" class="form-control" value="<?php echo e($toygroup->toy_group); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="toy_group" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter toy group here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="description">Toy Description</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <textarea name="description" class="form-control" rows="4"></textarea>
                                            <?php else: ?>
                                                <textarea name="description" class="form-control" rows="4"><?php echo e($toygroup->description); ?></textarea>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea name="description" class="form-control" rows="4"></textarea>
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