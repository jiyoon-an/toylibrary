<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var question = document.faq.question.value;
        var answer = document.faq.answer.value;

        if(question=="" || question==null) {
            alert("Please enter the question.");
            return false;
        } else if(answer=="" || answer==null) {
            alert("Please enter the answer.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FAQs</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if(!empty($func)): ?>
                            <?php if($func==='add'): ?>
                                Add FAQ
                            <?php elseif($func==='edit'): ?>
                                Edit FAQ
                            <?php else: ?>
                                FAQ Details
                            <?php endif; ?>
                        <?php else: ?>
                            Details
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(!empty($func)): ?>
                                    <?php if($func==='add'): ?>
                                        <form name="faq" action="../../faqadmin" method="post" onsubmit="return checkvalidation()">
                                    <?php elseif($func==='edit'): ?>
                                        <form name="faq" action="../../faqadmin/<?php echo e($faq->id); ?>" method="post" onsubmit="return checkvalidation()">
                                        <?php echo e(method_field('put')); ?>

                                    <?php else: ?>
                                        <form name="faq" action="../../faqadmin" method="get" onsubmit="return checkvalidation()">
                                    <?php endif; ?>
                                    <?php echo e(csrf_field()); ?>

                                <?php else: ?>
                                    <form name="faq" method="post" role="form" onsubmit="return checkvalidation()">
                                    <?php echo e(csrf_field()); ?>

                                <?php endif; ?>
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <input name="question" class="form-control">
                                            <?php else: ?>
                                                <input name="question" class="form-control" value="<?php echo e($faq->question); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input name="question" class="form-control">
                                        <?php endif; ?>
                                        <p class="help-block">Enter question here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                <textarea name="answer" class="form-control" rows="4"></textarea> 
                                            <?php else: ?>
                                                <textarea name="answer" class="form-control" rows="4"><?php echo e($faq->answer); ?></textarea> 
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea name="answer" class="form-control" rows="4"></textarea> 
                                        <?php endif; ?>
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