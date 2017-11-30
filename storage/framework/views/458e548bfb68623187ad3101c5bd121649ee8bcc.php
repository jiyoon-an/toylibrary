<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.toyadmin.name.value;
        var description = document.toyadmin.description.value;
        var brand = document.toyadmin.brand.value;
        var age_group_id = document.toyadmin.age_group_id.value;
        var toy_group_id = document.toyadmin.toy_group_id.value;
        var loan_type_id = document.toyadmin.loan_type_id.value;
        var status = document.toyadmin.status.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(description=="" || description==null) {
            alert("Please enter the description.");
            return false;
        } else if(brand=="" || brand==null) {
            alert("Please enter the brand.");
            return false;
        } else if(age_group_id=="" || age_group_id==null) {
            alert("Please select the age group.");
            return false;
        } else if(toy_group_id=="" || toy_group_id==null) {
            alert("Please select the toy group.");
            return false;
        } else if(loan_type_id=="" || loan_type_id==null) {
            alert("Please select the loan type.");
            return false;
        } else if(status=="" || status==null) {
            alert("Please select the status.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Toy information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form name="toyadmin" action="../../toyadmin/<?php echo e($toy->id); ?>" method="post" onsubmit="return checkvalidation()">
                                <?php echo e(method_field('put')); ?>

                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" class="form-control" value="<?php echo e($toy->name); ?>">
                                    <p class="help-block">Enter name of toy here.</p>
                                </div>
                               <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3"><?php echo e($toy->description); ?></textarea>
									<p class="help-block">Enter description of toy here.</p>
                                </div>
								<div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input name="brand" class="form-control" value="<?php echo e($toy->brand); ?>">
                                    <p class="help-block">Enter brand of toy here.</p>
                                </div>
								<div class="form-group">
                                    <label for="age_group_id">Age group</label>
                                    <select name="age_group_id" class="form-control">
                                        <?php if(isset($agegroups) && count($agegroups)>0): ?>
                                            <?php foreach($agegroups as $agegroup): ?>
                                                <?php if($agegroup->id === $toy->age_group_id): ?>
                                                    <option value="<?php echo e($agegroup->id); ?>" selected><?php echo e($agegroup->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($agegroup->id); ?>"><?php echo e($agegroup->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No Age Group Data</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label for="toy_group_id">Toy group</label>
                                    <select name="toy_group_id" class="form-control">
                                        <?php if(isset($toygroups) && count($toygroups)>0): ?>
                                            <?php foreach($toygroups as $toygroup): ?>
                                                <?php if($toygroup->id === $toy->toy_group_id): ?>
                                                    <option value="<?php echo e($toygroup->id); ?>" selected><?php echo e($toygroup->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($toygroup->id); ?>"><?php echo e($toygroup->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No Toy Group Data</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label for="loan_type_id">Loan type</label>
                                    <select name="loan_type_id" class="form-control">
                                        <?php foreach($loantypes as $loantype): ?>
                                            <?php if($loantype->id === $toy->loan_type_id): ?>
                                                <option value="<?php echo e($loantype->id); ?>" selected><?php echo e($loantype->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($loantype->id); ?>"><?php echo e($loantype->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label for="image">Toy image</label>
                                    <input name="image" type="file" value="<?php echo e($toy->image); ?>">
                                </div>
								<div class="form-group">
                                    <label for="shelf">Shelf</label>
                                    <input name="shelf" class="form-control" value="<?php echo e($toy->shelf); ?>">
                                    <p class="help-block">Enter shelf here.</p>
                                </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="purchased_date">Purchase date</label>
                                    <input name="purchased_date" class="form-control" value="<?php if($toy->purchased_date!=null): ?> <?php echo e(date('m d, Y', strtotime($toy->purchased_date))); ?> <?php else: ?> - <?php endif; ?>">
                                    <p class="help-block">Enter purchase date here.</p>
                                </div>
								<div class="form-group">
                                    <label for="purchased_from">Purchase from</label>
                                    <input name="purchased_from" class="form-control" value="<?php echo e($toy->purchased_from); ?>">
                                    <p class="help-block">Enter purchase from information here.</p>
                                </div>
								<div class="form-group">
                                    <label for="purchased_price">Purchase price</label>
                                    <input name="purchased_price" class="form-control" value="<?php echo e($toy->purchased_price); ?>">
                                    <p class="help-block">Enter purchase price here.</p>
                                </div>
								<div class="form-group">
                                    <label for="donated_by">Donated by</label>
                                    <input name="donated_by" class="form-control" value="<?php echo e($toy->donated_by); ?>">
                                    <p class="help-block">Enter name of donor here.</p>
                                </div>
								<div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-control" rows="3"><?php echo e($toy->note); ?></textarea>							
                                </div>
								<div class="form-group">
                                    <label for="alert">Alert</label>
                                    <input name="alert" class="form-control" value="<?php echo e($toy->alert); ?>">
                                    <p class="help-block">Enter alert information here.</p>
                                </div>
								<div class="form-group">
                                    <label for="status">Status</label>
                                    <input name="status" class="form-control" value="<?php echo e($toy->status); ?>">
                                    <p class="help-block">Enter status of toy here.</p>
                                </div>
								<div class="form-group">
                                    <label for="linked_toys">Linked toys</label>
                                    <input name="linked_toys" class="form-control" value="<?php echo e($toy->linked_toys); ?>">
                                    <p class="help-block">Enter linked toys here.</p>
                                </div>
								
								<button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
								<a class="btn btn-default" href="<?php echo e(url('/toyadmin')); ?>">Back</a>
								
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