<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Overdue Toys</h1>
        </div>
		<div class="row">
	        <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Overdue Toys
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
								<h2><?php echo e(date('d / m / Y', strtotime($today))); ?></h2>
                                <div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<td>Toy</td>
												<td>Member</td>
												<td>Issue Date</td>
												<td>Due Date</td>
												<td>Fee</td>
												<td>Holds</td>
												<td>Fine</td>
											</tr>
										</thead>
										<tbody>
											<?php if(isset($loanhistories) && count($loanhistories)>0): ?>
												<?php foreach($loanhistories as $loanhistory): ?>
													<tr>
														<td><?php echo e($loanhistory->toy->id); ?> : <?php echo e($loanhistory->toy->name); ?></td>
														<td><?php echo e($loanhistory->member->id); ?> : <?php echo e($loanhistory->member->user->first_name); ?> <?php echo e($loanhistory->member->user->last_name); ?></td>
														<td><?php echo e(date('m d, Y', strtotime($loanhistory->issue_date))); ?></td>
														<td><?php echo e(date('m d, Y', strtotime($loanhistory->due_date))); ?></td>
														<td>$ <?php echo e($loanhistory->cost); ?></td>
														<td>Holds Here</td>
														<td>Overdue Fines Here</td>
														<td>
															<div class="btn-group">
																<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
																Select
																	<span class="caret"></span>
																</button>
																<ul class="dropdown-menu pull-right" role="menu">
																	<li><a href="/memberadmin/<?php echo e($loanhistory->member->id); ?>/edit">Contact Member</a>
																	</li>
																	<li><a href="/toyadmin/<?php echo e($loanhistory->toy->id); ?>/edit">Toy Details</a>
																	</li>
																</ul>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php else: ?>
												<tr>
													<td colspan="8" style="text-align: center;">No Overdue Toy Data</td>
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