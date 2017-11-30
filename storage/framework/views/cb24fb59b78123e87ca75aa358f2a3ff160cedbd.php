<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Damaged Toys</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Damaged Toys List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Toy</th>
                                                <th>Damaged Date</th>
                                                <th>Estimated Repair Date</th>
    											<th>Repairer</th>
    											<th>Contact</th>
    											<th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($damages) && count($damages)>0): ?>
                                                <?php foreach($damages as $damage): ?>
                                                    <tr>
                                                        <td><?php echo e($damage->toy->name); ?></td>
                                                        <td><?php echo e(date('m d, Y', strtotime($damage->damage_date))); ?></td>
                                                        <td><?php echo e(date('m d, Y', strtotime($damage->repair_date))); ?></td>
                                                        <td><?php echo e($damage->repairer); ?></td>
                                                        <td><?php echo e($damage->contact); ?></td>
                                                        <td><?php echo e($damage->note); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">No Damaged Toy Data</td>
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