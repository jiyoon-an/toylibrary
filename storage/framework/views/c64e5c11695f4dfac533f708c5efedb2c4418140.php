<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library Details</h1>
                </div>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
										<h2>Library Name:</h2>
										<h3><?php echo e($libraryinfo->name); ?></h3>
										<h2>Address</h2>
										<h3>
											<?php echo e($libraryinfo->no); ?> <?php echo e($libraryinfo->building); ?> <?php echo e($libraryinfo->street); ?><br/>
											<?php echo e($libraryinfo->suburb); ?><br/>
											<?php echo e($libraryinfo->city->name); ?>

										</h3>
										<h2>Email:</h2>
										<h3><?php echo e($libraryinfo->email); ?></h3>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>
										<br/>

										<a href="<?php echo e(url('/libraryinfo/'.$libraryinfo->id.'/edit')); ?>" class="btn btn-primary btn-lg btn-block">Edit</a>
									</div>
									
									<div class="col-lg-6">
										<h2>Country:</h2>
										<h3><?php echo e($libraryinfo->country->name); ?></h3>
										<h2>Phone:</h2>
										<h3><?php echo e($libraryinfo->phone); ?></h3>
										<h2>Website</h2>
										<h3>http://www.mtroskilltoylibrary.org.nz</h3>
										<h2>Logo: </h2>
										<h3>
											<img src="<?php echo e('../img/logos/'.$libraryinfo->image); ?>"/>
										</h3>
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