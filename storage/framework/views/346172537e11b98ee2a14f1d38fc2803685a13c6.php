<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Details                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-12">
                            	<div class="panel panel-default">
									<div class="panel-heading">
										Member Info
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-12">
												<h4>Name:</h4>
												<p><?php echo e($order->loan_history->member->user->first_name); ?> <?php echo e($order->loan_history->member->user->last_name); ?></p>
												<h4>Address: </h4>
												<p><?php if(isset($order->loan_history->member->user->no)): ?>
													<?php echo e($order->loan_history->member->user->no); ?>

													<?php endif; ?> <?php if(isset($order->loan_history->member->user->building)): ?> <?php echo e($order->loan_history->member->user->building); ?> 
													<?php endif; ?> <?php if(isset($order->loan_history->member->user->street)): ?><?php echo e($order->loan_history->member->user->street); ?> 
													<?php endif; ?> <?php if(isset($order->loan_history->member->user->suburb)): ?><?php echo e($order->loan_history->member->user->suburb); ?> 
													<?php endif; ?> <?php if(isset($order->loan_history->member->user->city->name)): ?><?php echo e($order->loan_history->member->user->city->name); ?>

													<?php endif; ?> <?php if(isset($order->loan_history->member->user->country->name)): ?> <?php echo e($order->loan_history->member->user->country->name); ?>

													<?php endif; ?> <?php if(isset($order->loan_history->member->user->post_code)): ?> <?php echo e($order->loan_history->member->user->post_code); ?>

													<?php endif; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										Toys
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
                                					<table class="table table-hover">
                                    					<thead>
					                                        <tr>
					                                            <th>Code</th>
					                                            <th>Name</th>
					                                            <th>Last Checked</th>
					                                            <th>Status</th>
																
					                                        </tr>
					                                    </thead>
					                                    <tbody>
					                                        <tr>
					                                            <td><?php echo e($order->loan_history->toy->id); ?></td>
					                                            <td><?php echo e($order->loan_history->toy->name); ?></td>
					                                            <td><?php echo e(date('m d, Y', strtotime($order->loan_history->issue_date))); ?></td>
																<td><?php echo e($order->status); ?></td>
					                                        </tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>					
							</div>
						</div>
						<div class="form-group">
							<form action="../../order/<?php echo e($order->id); ?>" method="post" enctype="multipart/form-data">
							<?php echo e(method_field('put')); ?>

							<?php echo e(csrf_field()); ?>

	                            <label for="status">Status</label>
	                            <select name="status" class="form-control">
	                                <option value="varification">For Verification</option>
	                                <option value="returned">Returned</option>
	                                <option value="overdue">Overdue</option>
	                            </select>
	                            <button type="submit" class="btn btn-default">Process</button>
								<button onclick="history.go(0)" class="btn btn-default">Back</button>
                            </form>
                        </div>
					</div>
				</div>
            </div>						
			<!-- /.row -->
        </div>
        <!-- /.panel-body -->
    </div>				
</div>
<!-- /#page-wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>