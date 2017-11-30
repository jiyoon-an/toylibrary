<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Announcements</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Announcements List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
	                                <table class="table table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>Title</th>
	                                            <th>Message</th>
	                                            <th>Start Date</th>
	                                            <th>End Date</th>
												<th>Is Enabled</th>
												<th>Action</th>											
											</tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php if(isset($announcements) && count($announcements)>0): ?>
			                                    <?php foreach($announcements as $announcement): ?>
			                                    	<tr>
			                                    		<td><?php echo e($announcement->title); ?></td>
			                                    		<td><?php echo e($announcement->message); ?></td>
			                                    		<td><?php echo e(date('m d, Y', strtotime($announcement->start_date))); ?></td>
			                                    		<td><?php echo e(date('m d, Y', strtotime($announcement->end_date))); ?></td>
			                                    		<td><?php if($announcement->is_enabled === 1): ?> Y <?php else: ?> N <?php endif; ?></td>
			                                    		<td>
															<div class="btn-group">
																<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
																	Select
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="<?php echo e(url('/announcement/'.$announcement->id.'/edit')); ?>">Edit</a>
																	</li>
																	
																	<li>
																		<a href="#">
																			<form action="<?php echo e(url('/announcement/'.$announcement->id)); ?>" method="post">
																			    <input type="hidden" name="_method" value="DELETE">
																			    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
																			    <button type="submit" style="background:none; border:none;padding:0px">Delete</button>
																			</form>
																		</a>
																	</li>
																</ul>
															</div>											
														</td>
			                                    	</tr>
				                                <?php endforeach; ?>
				                            <?php else: ?>
				                            	<tr>
				                            		<td colspan="6" style="text-align: center;">No Announcement Data</td>
				                            	</tr>
				                            <?php endif; ?>
	                                    </tbody>
                                	</table>
                            	</div>
                            </div>
                            <!-- /.col-lg-12(nested) -->
                        </div>
                        <!-- /.row (nested) -->
						<a href="<?php echo e(url('/announcement/add')); ?>" class="btn btn-success btn-block">Add New 	Announcement</a>
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