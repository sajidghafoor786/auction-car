<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Users /</span> Edit
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="<?php echo e(route('admin.listUsers')); ?>" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="<?php echo e(route('admin.updateUser')); ?>" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                       placeholder="Enter Name" value="<?php echo e($user->name ?? old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Email <span class="steric">*</span></label>
                                <input type="email" name="email" id="email"
                                       class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                       placeholder="Enter Email" value="<?php echo e($user->email ?? old('email')); ?>" disabled>
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Phone No. <span class="steric"></span></label>
                                <input type="text" name="phone" id="phone"
                                       class="form-control <?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                       placeholder="Enter Phone Number" value="<?php echo e($user->phone ?? old('phone')); ?>">
                                <?php if($errors->has('phone')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">User Type <span class="steric">*</span></label>
                                 <select name="user_type" id="user_role" class="form-control select">
                                    <option value="">Select Type</option>
                                    <option value="1" <?php echo e($user->user_type == 1 ? 'selected' : ''); ?>> Admin</option>
                                    <option value="0" <?php echo e($user->user_type == 0 ? 'selected' : ''); ?>>User</option>
                                </select>
                            </div>
                            <div class="mb-3 col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <?php if($errors->has('confirm_password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('confirm_password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Status</label>
                                <div>
                                    <?php if($user->status == 0): ?>
                                        <input name="is_active" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="<?php echo e($user->status); ?>">
                                    <?php else: ?>
                                        <input name="is_active" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="<?php echo e($user->status); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e($user->id); ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /FormValidation -->
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('input[name="is_active"]').change(function() {
            if ($(this).is(":checked")) {
                $('input#is_active').val('1');
            } else {
                $('input#is_active').val('0');
            }
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/admin-user/edit.blade.php ENDPATH**/ ?>