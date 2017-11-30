<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sponsors</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sponsor List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sponsor Name</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Sponsor Website</th>
                                                <th>Is Enabled</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($sponsors) && count($sponsors)>0): ?>
                                                <?php foreach($sponsors as $sponsor): ?>
                                                    <tr>
                                                        <td><?php echo e($sponsor->name); ?></td>
                                                        <td>
                                                            <?php if($sponsor->start_date!=null): ?>
                                                                <?php echo e(date('m d, Y', strtotime($sponsor->start_date))); ?>

                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($sponsor->end_date!=null): ?>
                                                                <?php echo e(date('m d, Y', strtotime($sponsor->end_date))); ?>

                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($sponsor->website); ?></td>
                                                        <td>
                                                            <?php if($sponsor->is_enabled===1): ?>
                                                                Y
                                                            <?php else: ?>
                                                                N
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                    Select
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li><a href="<?php echo e(url('/sponsoradmin/'.$sponsor->id.'/edit')); ?>">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <form action="<?php echo e(url('/sponsoradmin/'.$sponsor->id)); ?>" method="post">
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
                                                    <td colspan="6" style="text-align: center;">No Sponsor Data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <a href="<?php echo e(url('/sponsoradmin/add')); ?>" class="btn btn-success btn-block">Add New Sponsor</a>
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