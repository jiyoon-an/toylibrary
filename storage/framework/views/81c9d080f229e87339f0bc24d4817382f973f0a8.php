<?php $__env->startSection('content'); ?>
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
                                            <?php if(isset($toys) && count($toys)>0): ?>
                                                <?php foreach($toys as $count=>$toy): ?>
                                                    <tr>
                                                        <td><?php echo e($toy->age_group->name); ?></td>
                                                        <td><?php echo e(array_get($children_male, $count)); ?></td>
                                                        <td><?php echo e(array_get($children_female, $count)); ?></td>
                                                        <td><?php echo e(array_get($children_unknown, $count)); ?></td>
                                                        <td><?php echo e(array_get($children_male, $count) + array_get($children_female, $count) + array_get($children_unknown, $count)); ?></td>
                                                        <?php if($children_total===0): ?>
                                                            <td>0 %</td>
                                                        <?php else: ?>
                                                            <td><?php echo e((array_get($children_male, $count) + array_get($children_female, $count) + array_get($children_unknown, $count)) * 100 / $children_total); ?> %</td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($toy->count); ?></td>
                                                        <td><?php echo e($toy->count / $toy_total * 100); ?> %</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="7" style="text-align: center;">No Age Group Data</td>
                                                </tr>
                                            <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>