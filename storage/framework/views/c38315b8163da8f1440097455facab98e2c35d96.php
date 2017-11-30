<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Email Templates</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Templates
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <table class="table table-hover">
										<thead>
											<tr>
												<td>Title</td>
												<td>Subject</td>
												<td>Message</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											<tr>
												<td>Overdue Toy</td>
												<td>Please return overdue</td>
												<td>ContentContentContentContent
												ContentContentContentContentContent
												ContentContentContent</td>
												<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														Select
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="<?php echo e(url('/toyadmin')); ?>">Edit</a>
														</li>
														<li><a href="#">Delete</a>
														</li>
														<li><a href="#">Details</a>
														</li>
													</ul>
												</div>											
											</td>
											</tr>
											
										</tbody>
									</table>  
									<a class="btn btn-success btn-block" href="<?php echo e(url('/emailtemplatedetail')); ?>">Add New Email Template</a>
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