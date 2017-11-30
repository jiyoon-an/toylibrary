<?php $__env->startSection('content'); ?>
<div class="cd-user-modal-container">
    <div class="row">
        <h2 style="text-align: center;">Register New Account</h2>
        <div id="cd-signup" class="is-selected">
            <form class="cd-form" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" name="username" value="<?php echo e(old('username')); ?>" required>
                        <?php if($errors->has('username')): ?>
                            <span class="cd-error-message is-visible"><strong><?php echo e($errors->first('username')); ?></strong></span>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email" value="<?php echo e(old('email')); ?>" required>
                        <?php if($errors->has('email')): ?>
                            <span class="cd-error-message is-visible"><strong><?php echo e($errors->first('email')); ?></strong></span>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" type="password" id="signup-password" type="text"  placeholder="Password" name="password" required minlength=6>
                        <a href="" class="hide-password">Show</a>
                        <?php if($errors->has('password')): ?>
                            <span class="cd-error-message is-visible"><strong><?php echo e($errors->first('password')); ?></strong></span>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password-confirm">Password</label>
                        <input class="full-width has-padding has-border" type="password" id="signup-password-confirm" type="text" placeholder="Confirm Password" name="password_confirmation" required>
                        <a href="" class="hide-password">Show</a>
                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="cd-error-message is-visible"><strong><?php echo e($errors->first('password_confirmation')); ?></strong></span>
                        <?php endif; ?>
                    </p>
                </div>
                <p class="fieldset">
                    <label class="image-replace cd-membership" for="signup-membership">Membership</label>
                    <select class="full-width has-padding has-border" id="signup-membership" name="membership_id" onchange="updateTC();">
                        <?php foreach($memberships as $membership): ?>
                            <option value=<?php echo e($membership->id); ?> <?php echo e($membership->id == $selected_id ? 'selected' : ''); ?>>
                                <?php echo e($membership->name); ?>

                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="display-info">Membership</span>
                </p>
                <p class="fieldset">
                    <input type="checkbox" id="accept-terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you have read and accepted the Terms and Conditions' : '');" required>
                    <label for="accept-terms">I agree to the <a id="tcMembership" href="" style="color:blue" data-toggle="modal" data-target="<?php echo e($selected_id == 2 ? '#partyhireModal' : '#annualModal'); ?>">Terms and Conditions</a></label>
                </p>
                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Create account">
                </p>
            </form>
            <p class="cd-form-bottom-message">
                <a href="<?php echo e(url('/login')); ?>">Already a member? Login Account</a>
            </p>
        </div> <!-- cd-signup -->
    </div>
</div>
<?php echo $__env->make('termsandconditions.annual', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('termsandconditions.partyhire', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.library', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>