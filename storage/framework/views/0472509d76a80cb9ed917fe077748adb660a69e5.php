<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members Loan History</h1>
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
						<form action="/memberloanhistory" method="post" role="form">
                        <?php echo e(csrf_field()); ?>

							<div class="form-group">
                                <label for="member">Member</label>
                                <select name="member" class="form-control">
                                    <?php if(isset($members) && count($members)>0): ?>
                                        <?php foreach($members as $member): ?>
                                            <?php if(isset($loanhistories)): ?>
                                                <?php if(count($loanhistories)>0): ?>
                                                    <?php if($member->id === $loanhistories->get(0)->member_id): ?>
                                                        <option value="<?php echo e($member->id); ?>" selected><?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></option>
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
							<button type="submit" class="btn btn-default">Submit Button</button>
						</form>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Issued Date</th>
                                        <th>Toy</th>
                                        <th>Due Date</th>
                                        <th>Returned Date</th>
										<th>Fine<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($loanhistories)): ?>
                                        <?php if(count($loanhistories)>0): ?>
                                            <?php foreach($loanhistories as $loanhistory): ?>
                                                <tr>
                                                    <td><?php echo e(date('m d, Y', strtotime($loanhistory->issue_date))); ?></td>
                                                    <td><?php echo e($loanhistory->toy->name); ?></td>
                                                    <td><?php echo e(date('m d, Y', strtotime($loanhistory->due_date))); ?></td>
                                                    <td><?php echo e(date('m d, Y', strtotime($loanhistory->returned_date))); ?></td>
                                                    <td>$ <?php echo e($loanhistory->cost); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center">No Data</td>
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