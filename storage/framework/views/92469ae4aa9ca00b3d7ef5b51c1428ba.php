<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> Add
    </h4>

    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="<?php echo e(route('admin.carAuction.index')); ?>" class="btn btn-primary float-end">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="<?php echo e(route('admin.carAuction.store')); ?>" method="POST" enctype="multipart/form-data" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin">
                        <?php echo csrf_field(); ?>
                        <div class="col-sm-6">
                            <label class="form-label">Select Car <span class="steric">*</span></label>
                            <select name="car_id" class="form-control <?php echo e($errors->has('car_id') ? 'is-invalid' : ''); ?>">
                                <option value="">-- Select Car --</option>
                                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($car->id); ?>" <?php echo e(old('car_id') == $car->id ? 'selected' : ''); ?>>
                                    <?php echo e($car->name); ?> (<?php echo e($car->make); ?> - <?php echo e($car->model); ?>)
                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['car_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Minimum Bid (PKR) <span class="steric">*</span></label>
                            <input type="number" name="minimum_bid" class="form-control <?php echo e($errors->has('minimum_bid') ? 'is-invalid' : ''); ?>" placeholder="Enter Starting Price" value="<?php echo e(old('minimum_bid')); ?>">
                            <?php $__errorArgs = ['minimum_bid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Current Bid (PKR) <span class="steric"></span></label>
                            <input type="number" name="current_bid" class="form-control <?php echo e($errors->has('current_bid') ? 'is-invalid' : ''); ?>" placeholder="Enter Starting Price" value="<?php echo e(old('current_bid')); ?>">
                            <?php $__errorArgs = ['current_bid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Start Date <span class="steric">*</span></label>
                            <input type="datetime-local" name="start_date" class="form-control <?php echo e($errors->has('start_date') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('start_date')); ?>">
                            <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">End Date <span class="steric">*</span></label>
                            <input type="datetime-local" name="end_date" class="form-control <?php echo e($errors->has('end_date') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('end_date')); ?>">
                            <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>



                        <div class="col-sm-6">
                            <label class="form-label">Select Status <span class="steric">*</span></label>
                            <select name="status" class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>">
                                <option value="">-- Select Status --</option>
                                <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>> Active</option>
                                <option value="closed" <?php echo e(old('status') == 'closed' ? 'selected' : ''); ?>> Closed</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Auction</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('input#is_active').val('1');
    });

    $('input[name="is_active"]').change(function() {
        if ($(this).is(":checked")) {
            $('input#is_active').val('1');
        } else {
            $('input#is_active').val('0');
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/car-auction/create.blade.php ENDPATH**/ ?>