<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Cars /</span> Add
    </h4>

    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="<?php echo e(route('admin.cars.index')); ?>" class="btn btn-primary float-end">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="<?php echo e(route('admin.cars.store')); ?>" method="POST" enctype="multipart/form-data" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin">
                        <?php echo csrf_field(); ?>

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Name <span class="steric">*</span></label>
                            <input type="text" name="name" class="form-control <?php echo e($errors->has('make') ? 'is-invalid' : ''); ?>" placeholder="Enter Make" value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['make'];
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
                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Make <span class="steric">*</span></label>
                            <input type="text" name="make" class="form-control <?php echo e($errors->has('make') ? 'is-invalid' : ''); ?>" placeholder="Enter Make" value="<?php echo e(old('make')); ?>">
                            <?php $__errorArgs = ['make'];
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

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Model <span class="steric">*</span></label>
                            <input type="text" name="model" class="form-control <?php echo e($errors->has('model') ? 'is-invalid' : ''); ?>" placeholder="Enter Model" value="<?php echo e(old('model')); ?>">
                            <?php $__errorArgs = ['model'];
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

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Year <span class="steric">*</span></label>
                            <input type="number" name="year" class="form-control <?php echo e($errors->has('year') ? 'is-invalid' : ''); ?>" placeholder="Enter Year" value="<?php echo e(old('year')); ?>">
                            <?php $__errorArgs = ['year'];
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
                        
                        <div class="col-sm-12 col-md-12">
                            <label class="form-label">Description <span class="steric">*</span></label>
                            <textarea name="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" rows="4" placeholder="Enter Description"><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
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

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Car Image <span class="steric">*</span></label>
                            <input type="file" name="image" class="form-control <?php echo e($errors->has('image') ? 'is-invalid' : ''); ?>">
                            <?php $__errorArgs = ['image'];
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
<div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                            <label class="form-label">Status</label>
                            <div>
                                <input name="is_active" checked type="checkbox"
                                    <?php echo e((old("is_active") == 1 ? "checked":'')); ?> data-toggle="toggle">
                                <input type="hidden" name="is_active" id="is_active"
                                    value="<?php echo e((old("is_active") == 1 ? 1 : 0)); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Car</button>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/cars/create.blade.php ENDPATH**/ ?>