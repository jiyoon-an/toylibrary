<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var title = document.announcement.title.value;
        var message = document.announcement.message.value;
        var start_date = document.announcement.start_date.value;
        var end_date = document.announcement.end_date.value;

        if(title=="" || title==null) {
            alert("Please enter the title.");
            return false;
        } else if(message=="" || message==null) {
            alert("Please enter the message.");
            return false;
        } else if(start_date=="" || start_date==null) {
            alert("Please enter the start date.");
            return false;
        } else if(end_date=="" || end_date==null) {
            alert("Please enter the end date.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Announcement</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($announcement)): ?>
                            Edit Announcement
                        <?php else: ?>
                            Add Announcement
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <?php if(!empty($announcement)): ?>
                                <form name="announcement" action="../../announcement/<?php echo e($announcement->id); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    <?php echo e(method_field('put')); ?>

                                    <input type="hidden" name="user_id" value="<?php echo e($announcement->user_id); ?>" />
                            <?php else: ?>        
                                <form name="announcement" action="../announcement" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    <input type="hidden" name="user_id" value="1" />
                            <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

									<div class="form-group">
                                        <label for="title">Title</label>
                                        <?php if(!empty($announcement)): ?>
                                            <input name="title" class="form-control" value="<?php echo e($announcement->title); ?> ">
                                        <?php else: ?>        
                                            <input name="title" class="form-control" value="">
                                        <?php endif; ?>
                                        <p class="help-block">Enter title here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="message">Message</label>
                                        <?php if(!empty($announcement)): ?>
                                            <textarea name="message" class="form-control" rows="4"><?php echo e($announcement->message); ?></textarea>
                                        <?php else: ?>        
                                            <textarea name="message" class="form-control" rows="4"></textarea>
                                        <?php endif; ?>
                                    </div>
									<div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <?php if(!empty($announcement)): ?>
                                            <input name="start_date" class="form-control" value="<?php echo e(date('m d, Y', strtotime($announcement->start_date))); ?>">
                                        <?php else: ?>        
                                            <input name="start_date" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter start date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <?php if(!empty($announcement)): ?>
                                            <input name="end_date" class="form-control" value="<?php echo e(date('m d, Y', strtotime($announcement->end_date))); ?>">
                                        <?php else: ?>        
                                            <input name="end_date" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter end date here.</p>
                                    </div>
									<div class="checkbox">
                                        <label for="is_enabled">
                                            <?php if(!empty($announcement)): ?>
                                                <?php if($announcement->is_enabled == 1): ?>
                                                    <input name="is_enabled" type="checkbox" value="1" checked>Enabled
                                                <?php else: ?>
                                                    <input name="is_enabled" type="checkbox" value="1">Enabled
                                                <?php endif; ?>
                                            <?php else: ?>        
                                                <input name="is_enabled" type="checkbox" value="1">Enabled
                                            <?php endif; ?>                                            
                                        </label>
                                    </div>									
									<button type="submit" class="btn btn-default">Submit</button>
								</form>
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