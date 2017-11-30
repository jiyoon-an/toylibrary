<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.libraryinfo.name.value;
        var street = document.libraryinfo.street.value;
        var phone = document.libraryinfo.phone.value;
        var email = document.libraryinfo.email.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(street=="" || street==null) {
            alert("Please enter the street.");
            return false;
        } else if(phone=="" || phone==null) {
            alert("Please enter the phone.");
            return false;
        } else if(email=="" || email==null) {
            alert("Please enter the email.");
            return false;
        } else if(email.indexOf('@') == -1) {
            alert("Please check email address.")
            return false;
        } else {
            return true;
        }

    }
</script>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Library Details
                        </div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<form name="libraryinfo" action="../../libraryinfo/<?php echo e($libraryinfo->id); ?>" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation();">
                                        <?php echo e(method_field('put')); ?>

                                        <?php echo e(csrf_field()); ?>

										<div class="form-group">
                                            <label for="name">Library Name</label>
                                            <input id="name" class="form-control" name="name" value="<?php echo e($libraryinfo->name); ?>">
                                            <p class="help-block">Enter name of toy here.</p>
                                        </div>
										<div class="form-group">
                                            <label for="no">House/Apt Np</label>
                                            <input class="form-control" name="no" value="<?php echo e($libraryinfo->no); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="building">Building</label>
                                            <input class="form-control" name="building" value="<?php echo e($libraryinfo->building); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="street">Street</label>
                                            <input class="form-control" id="street" name="street" value="<?php echo e($libraryinfo->street); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="suburb">Suburb</label>
                                            <input class="form-control" name="suburb" value="<?php echo e($libraryinfo->suburb); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="city_id">City</label>
                                            <select class="form-control" name="city_id">
                                                <?php foreach($cities as $city): ?>
                                                    <?php if($city->id === $libraryinfo->city_id): ?>
                                                        <option value="<?php echo e($city->id); ?>" selected><?php echo e($city->name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label for="post_code">Post Code</label>
                                            <input class="form-control" name="post_code" value="<?php echo e($libraryinfo->post_code); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="country_id">Country</label>
                                            <select class="form-control" name="country_id">
                                                <option value="<?php echo e($country->id); ?>" selected><?php echo e($country->name); ?></option>
                                            </select>
                                        </div>
				
										<br/>
										<br/>
										<br/>
								</div>
								<div class="col-lg-6">
										<div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" id="phone" name="phone" value="<?php echo e($libraryinfo->phone); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="fax">Fax</label>
                                            <input class="form-control" name="fax" value="<?php echo e($libraryinfo->fax); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input class="form-control" name="mobile" value="<?php echo e($libraryinfo->mobile); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" name="email" value="<?php echo e($libraryinfo->email); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input class="form-control" name="facebook" value="<?php echo e($libraryinfo->facebook); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input class="form-control" name="twitter" value="<?php echo e($libraryinfo->twitter); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="google_plus">Google Plus</label>
                                            <input class="form-control" name="google_plus" value="<?php echo e($libraryinfo->google_plus); ?>">
                                            
                                        </div>
										<div class="form-group">
                                            <label for="note">Note</label>
                                            <textarea class="form-control" name="note" rows="3">
                                                <?php echo e($libraryinfo->note); ?>

                                            </textarea>											
                                        </div>
										<div class="form-group">
                                            <label for="image">Logo</label>
                                            <input type="file" name="image">
                                        </div>
								</div>
							</div>
							<button type="submit" class="btn btn-default">Update Library Info</button>
                            <button type="reset" class="btn btn-default">Reset</button>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			
			
			
			
			
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>