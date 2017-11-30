<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toys For Sale</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Sale                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="col-lg-6">
					     <form id="frm_toysforsale" method="post">
                            <input type="hidden" name="_method" value="PUT">
                                <?php echo e(csrf_field()); ?>

							<div class="form-group">
                                <label for="toy_id">Toy Code</label>
                                <select name="toy_id" class="form-control">
                                    <?php if(isset($toys) && count($toys)>0): ?>
                                        <?php foreach($toys as $toy): ?>
                                            <?php if(isset($search)): ?>
                                                <?php if($search === $toy->name): ?>
                                                    <option value="<?php echo e($toy->id); ?>" selected><?php echo e($toy->id); ?> : <?php echo e($toy->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($toy->id); ?>"><?php echo e($toy->id); ?> : <?php echo e($toy->name); ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?php echo e($toy->id); ?>"><?php echo e($toy->id); ?> : <?php echo e($toy->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No Toy Data</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="member_id">Member : </label>
                                <select name="member_id" class="form-control">
                                    <?php if(isset($members) && count($members)>0): ?>
                                        <?php foreach($members as $member): ?>
                                            <option value="<?php echo e($member->id); ?>"><?php echo e($member->id); ?> : <?php echo e($member->user->first_name); ?> <?php echo e($member->user->last_name); ?></option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No Member Data</option>
                                    <?php endif; ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label for="price">Sale Price : </label>
                                <input name="price" class="form-control" placeholder="Enter sale price here.">
                            </div>
							<button formaction="../toysforsale/add" class="btn btn-default">Add to List</button>
							<button formaction="../toysforsale/confirm" class="btn btn-default">Confirm Sale</button>
							<button formaction="../toysforsale/dispose" class="btn btn-default">Dispose</button>
							<button formaction="../toysforsale/remove" class="btn btn-default">Remove from List</button>
                        </form>
                    </div>
					<div class="col-lg-6">
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Toy Code</th>
                                        <th>Toy Name</th>
                                        <th>Sale Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($toysforsale) && count($toysforsale)>0): ?>
                                        <?php foreach($toysforsale as $toy): ?>
                                            <tr>
                                                <td><?php echo e($toy->id); ?></td>
                                                <td><?php echo e($toy->name); ?></td>
                                                <td><?php echo e($toy->purchased_price); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" style="text-align: center">No Toys for Sale</td>
                                        </tr>
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