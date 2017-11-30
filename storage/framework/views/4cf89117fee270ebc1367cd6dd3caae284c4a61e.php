<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Carousel</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Carousel Images
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <h1>First Image</h1>                                     
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <input type="file">
                                        </div>
										
										<h1>Second Image</h1>
										<div class="form-group">
                                            <label>Select Image</label>
                                            <input type="file">
                                        </div>
										
										<h1>Third Image</h1>
										<div class="form-group">
                                            <label>Select Image</label>
                                            <input type="file">
                                        </div>
										
										
                                        
                                        <button type="submit" class="btn btn-default">Save</button>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>