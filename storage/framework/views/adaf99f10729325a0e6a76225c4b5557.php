<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Cars /</span> Edit
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="<?php echo e(route('admin.cars.index')); ?>" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="<?php echo e(route('admin.cars.update', $car->id )); ?>" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="col-sm-6">
                                <label class="form-label">Car Name <span class="steric">*</span></label>
                                <input type="text" name="name" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
                                       placeholder="Enter Car Name" value="<?php echo e($car->name ?? old('name')); ?>">
                                <?php $__errorArgs = ['name'];
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
                                <label class="form-label">Make <span class="steric">*</span></label>
                                <input type="text" name="make" class="form-control <?php echo e($errors->has('make') ? 'is-invalid' : ''); ?>"
                                       placeholder="Enter Make" value="<?php echo e($car->make ?? old('make')); ?>">
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

                            <div class="col-sm-6">
                                <label class="form-label">Model <span class="steric">*</span></label>
                                <input type="text" name="model" class="form-control <?php echo e($errors->has('model') ? 'is-invalid' : ''); ?>"
                                       placeholder="Enter Model" value="<?php echo e($car->model ?? old('model')); ?>">
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

                            <div class="col-sm-6">
                                <label class="form-label">Year <span class="steric">*</span></label>
                                <input type="text" name="year" class="form-control <?php echo e($errors->has('year') ? 'is-invalid' : ''); ?>"
                                       placeholder="Enter Year" value="<?php echo e($car->year ?? old('year')); ?>">
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

                            <div class="col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3"><?php echo e($car->description ?? old('description')); ?></textarea>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                                <?php if($car->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $car->image)); ?>" width="100" class="mt-2" />
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Status</label>
                                <div>
                                    <?php if($car->status == 0): ?>
                                        <input name="is_active" type="checkbox" data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="0">
                                    <?php else: ?>
                                        <input name="is_active" type="checkbox" checked data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="1">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="<?php echo e($car->id); ?>">
                                <button type="submit" class="btn btn-primary">Update Car</button>
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
        $('input[name="is_active"]').change(function () {
            $('#is_active').val($(this).is(':checked') ? '1' : '0');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/cars/edit.blade.php ENDPATH**/ ?>