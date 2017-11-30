<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
	function search() {
		var text = document.getElementById("search").value;
		location.href = "/memberadmin/"+text;
	}
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Members List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Member List                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							
							<div class="input-group custom-search-form">
                                <input type="text" id="search" class="form-control" placeholder="Search...">
		                        <span class="input-group-btn">
		                            <button class="btn btn-default" type="button" onclick="search()">
		                                <i class="fa fa-search"></i>
		                            </button>
		                        </span>
                            </div>
							
                            <div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($members) && count($members)>0): ?>
                                        	<?php foreach($members as $member): ?>
                                        		<tr>
                                        			<td><?php echo e($member->id); ?></td>
                                        			<td><?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></td>
                                        			<td>
                                                        <?php if($member->outstanding_bonds === null): ?>
                                                            -
                                                        <?php else: ?>
                                                            $ <?php echo e($member->outstanding_bonds); ?>

                                                        <?php endif; ?>
                                                    </td>
                                        			<td>
                                        				<div class="btn-group">
    														<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
    															Select
    															<span class="caret"></span>
    														</button>
    														<ul class="dropdown-menu pull-right" role="menu">
    															<li><a href="<?php echo e(url('/memberadmin/'.$member->id.'/edit')); ?>">Edit</a>
    															</li>
    															
    															<li>
    																<a href="#">
    																	<form action="<?php echo e(url('/memberadmin/'.$member->id)); ?>" method="post">
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
                                                <td colspan="4" style="text-align: center;">No Member Data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
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