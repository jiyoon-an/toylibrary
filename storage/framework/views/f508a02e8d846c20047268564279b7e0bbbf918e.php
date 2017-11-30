<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
	function search() {
		var text = document.getElementById("search").value;
		location.href = "/loantype/"+text;
	}
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loan Type List</h1>
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
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($loantypes) && count($loantypes)>0): ?>
                                        	<?php foreach($loantypes as $loantype): ?>
                                        		<tr>
                                        			<td><?php echo e($loantype->name); ?></td>
                                        			<td><?php echo e($loantype->loan_price); ?></td>
                                        			<td><?php echo e($loantype->note); ?></td>
                                        			<td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                Select
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li><a href="<?php echo e(url('/loantype/'.$loantype->id.'/edit')); ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <form action="<?php echo e(url('/loantype/'.$loantype->id)); ?>" method="post">
                                                                            <input type="hidden" name="_method" value="delete">
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
                                                <td colspan="4" style="text-align: center;">No Loan Type Data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
								<a class="btn btn-success" href="<?php echo e(url('/loantype/add')); ?>">Add New Loan Type</a>
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