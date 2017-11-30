<?php $__env->startSection('content'); ?>
<!-- Start of Content -->
<script type="text/javascript">
    var news_id="";

    function tempNewsId(newsid) {
        news_id = newsid;
    }

    function select(functype) {
        if(functype=='add') {
            location.href = "/newsadmin/add"
        } else if(functype=='edit') {
            if(news_id=="") {
                alert("Select News first");
            } else {
                location.href = "/newsadmin/"+news_id+"/edit";  
            }
        } else {
            if(news_id=="") {
                alert("Select News First");
            } else {
                location.href = "/newsadmin/"+news_id+"/delete";    
            }
        }
    }

    function search() {
        var text = document.getElementById("search").value;
        location.href = "/newsadmin/"+text;
    }

    function checkvalidation() {
        var date = document.news.date.value;
        var headline = document.news.headline.value;
        var content = document.news.content.value;

        if(date=="" || date==null) {
            alert("Please enter the date.");
            return false;
        } else if(headline=="" || headline==null) {
            alert("Please enter the headline.");
            return false;
        } else if(content=="" || content==null) {
            alert("Please enter the content.");
            return false;
        } else {
            return true;
        }

    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        News List and Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
								<div class="input-group custom-search-form">
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" onclick="search()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <br/>
								<div class="col-lg-4">
                                    <button id="btnAdd" class="btn btn-success btn-block" onclick="select('add')">Add</button>
								</div>
								<div class="col-lg-4">
									<button id="btnEdit" class="btn btn-info btn-block" onclick="select('edit')">Edit</button>
								</div>
								<div class="col-lg-4">
									<button id="btnDelete" class="btn btn-danger btn-block" onclick="select('delete')">Delete</button>
								</div>
								<br/>
								<div class="table-responsive">								
								</div>
								<table class="table table-hover">
									<thead>
										<tr>
											<td>Date</td>
											<td>Headline</td>
											<td>Content</td>
										</tr>
									</thead>
									<tbody>
                                        <?php if(isset($news) && count($news)>0): ?>
                                            <?php foreach($news as $onenews): ?>
                                                <tr>
                                                    <td onclick="tempNewsId('<?php echo e($onenews->id); ?>')"><?php echo e(date('m d, Y', strtotime($onenews->date))); ?></td>
                                                    <td onclick="tempNewsId('<?php echo e($onenews->id); ?>')"><?php echo e($onenews->headline); ?></td>
                                                    <td onclick="tempNewsId('<?php echo e($onenews->id); ?>')"><?php echo e($onenews->content); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" style="text-align: center;">No News Data</td>
                                            </tr>
                                        <?php endif; ?>
									</tbody>
								</table>
                            </div>
							<div class="col-lg-6">
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php if(!empty($func)): ?>
                                            <?php if($func==='add'): ?>
                                                Add Newsletter
                                            <?php elseif($func==='edit'): ?>
                                                Edit Newsletter
                                            <?php else: ?>
                                                Delete Newsletter
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Newsletter
                                        <?php endif; ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php if(!empty($func)): ?>
                                                    <?php if($func==='add'): ?>
                                                        <form name="news" action="../../newsadmin" method="post" onsubmit="return checkvalidation()">
                                                    <?php elseif($func==='edit'): ?>
                                                        <form name="news" action="../../newsadmin/<?php echo e($result->id); ?>" method="post" onsubmit="return checkvalidation()">
                                                        <?php echo e(method_field('put')); ?>

                                                    <?php else: ?>
                                                        <form name="news" action="../../newsadmin/<?php echo e($result->id); ?>" method="post" onsubmit="return checkvalidation()">
                                                        <?php echo e(method_field('delete')); ?>

                                                    <?php endif; ?>
                                                    <?php echo e(csrf_field()); ?>

                                                <?php else: ?>
                                                    <form name="news" method="post" role="form" onsubmit="return checkvalidation()">
                                                    <?php echo e(csrf_field()); ?>

                                                <?php endif; ?>
                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <?php if(!empty($func)): ?>
                                                            <?php if($func==='add'): ?>
                                                                <input name="date" class="form-control">
                                                            <?php else: ?>
                                                                <input name="date" class="form-control" value="<?php echo e(date('m d, Y', strtotime($result->date))); ?>">
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <input name="date" class="form-control">
                                                        <?php endif; ?>
                                                        <p class="help-block">Enter date here.</p>
                                                    </div>
            										<div class="form-group">
                                                        <label for="headline">Headline</label>
                                                        <?php if(!empty($func)): ?>
                                                            <?php if($func==='add'): ?>
                                                                <input name="headline" class="form-control">
                                                            <?php else: ?>
                                                                <input name="headline" class="form-control" value="<?php echo e($result->headline); ?>">
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <input name="headline" class="form-control">
                                                        <?php endif; ?>
                                                        <p class="help-block">Enter newsletter headline here.</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <?php if(!empty($func)): ?>
                                                            <?php if($func==='add'): ?>
                                                                <textarea name="content" class="form-control" rows="4"></textarea>
                                                            <?php else: ?>
                                                                <textarea name="content" class="form-control" rows="4"><?php echo e($result->content); ?></textarea>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <textarea name="content" class="form-control" rows="4"></textarea>
                                                        <?php endif; ?>
            											<p class="help-block">Enter newsletter content here.</p>
                                                    </div>
                                                                               
                                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                                </form>
                                            </div>
                                            <!-- /.col-lg-12(nested) -->
                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
							</div>                                
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