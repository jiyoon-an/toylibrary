<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members Transaction History</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> History                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="col-lg-6">
						<form action="/membertransactionhistory" method="post" role="form">
                        <?php echo e(csrf_field()); ?>

							<div class="form-group">
                                <label for="member">Member</label>
                                <select name="member" class="form-control">
                                    <?php if(isset($members) && count($members)>0): ?>
                                        <?php foreach($members as $member): ?>
                                            <?php if(isset($transactions)): ?>
                                                <?php if(count($transactions)>0): ?>
                                                    <?php if($member->id === $transactions->get(0)->member_id): ?>
                                                        <option value="<?php echo e($member->id); ?>" selected><?php echo e($member->user->username); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($member->id); ?>"><?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></option>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <option value="<?php echo e($member->id); ?>"><?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?php echo e($member->id); ?>"><?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No Member Data</option>
                                    <?php endif; ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label for="from" >From Date:</label>
                                <input name="from" id="from" class="form-control" placeholder="Enter  date here." value="">
                            </div>
                            <div class="form-group">
                                <label for="to">To Date:</label>
                                <input name="to", id="to" class="form-control" placeholder="Enter date here." vale="">
                            </div>
							<div class="form-group input-group">
								<input type="text" id="disabledInput" placeholder="$0.00" class="form-control" disabled>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-money"></i>
                                    </button>
                                </span>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Details</th>
                                        <th>Staff</th>
                                        <th>Credit</th>
										<th>Debit<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($transactions) && count($transactions)>0): ?>
                                        <?php if(count($transactions)>0): ?>
                                            <?php foreach($transactions as $transaction): ?>
                                                <tr>
                                                    <td><?php echo e(date('m d, Y', strtotime($transaction->transaction_date))); ?></td>
                                                    <td><?php echo e($transaction->details); ?></td>
                                                    <td>
                                                        <?php if($transaction->staff_id === 0): ?>
                                                            Admin
                                                        <?php else: ?>
                                                            <?php echo e($transaction->member->user->first_name); ?> <?php echo e($transaction->member->user->last_name); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td>$ <?php echo e($transaction->credit); ?></td>
                                                    <td>$ <?php echo e($transaction->debit); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Transaction Data</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
					</div>
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