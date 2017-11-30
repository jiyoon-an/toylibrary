<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Disposed Toys</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> List                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">				
                    <div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Disposal Date</th>
                                            <th>Method</th>
											<th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($disposes) && count($disposes)>0): ?>
                                            <?php foreach($disposes as $dispose): ?>
                                                <tr>
                                                    <td><?php echo e($dispose->toy->id); ?></td>
                                                    <td><?php echo e($dispose->toy->name); ?></td>
                                                    <td><?php echo e(date('m d, Y', strtotime($dispose->disposal_date))); ?></td>
                                                    <td><?php echo e($dispose->toy->disposal_method); ?></td>
                                                    <td><?php echo e($dispose->toy->note); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="=5" style="text-align: center;">No Disposed Toy Data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
						</div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>