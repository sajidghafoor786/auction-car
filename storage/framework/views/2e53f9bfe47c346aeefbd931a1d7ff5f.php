<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Car Auctions /</span> Edit
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
                        <form action="<?php echo e(route('admin.carAuction.update', $auction->id)); ?>" method="POST" class="row g-3 ajax-form-admin">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                        <div class="col-sm-6">
                            <label class="form-label">Select Car <span class="steric">*</span></label>
                            <select name="car_id" class="form-control <?php echo e($errors->has('car_id') ? 'is-invalid' : ''); ?>">
                                <option value="">-- Select Car --</option>
                                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($car->id); ?>" <?php echo e(old('car_id') == $car->id ? 'selected' : ''); ?> <?php echo e($car->id == $auction->car_id ?'selected' : ''); ?> >
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
                                <label class="form-label">Minimum Bid <span class="steric">*</span></label>
                                <input type="text" name="minimum_bid" class="form-control <?php echo e($errors->has('minimum_bid') ? 'is-invalid' : ''); ?>"
                                    value="<?php echo e(old('minimum_bid', $auction->minimum_bid)); ?>" placeholder="Enter Minimum Bid">
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
                                <label class="form-label">Current Bid</label>
                                <input type="text" name="current_bid" class="form-control"
                                    value="<?php echo e(old('current_bid', $auction->current_bid)); ?>" placeholder="Current Bid">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Start Date <span class="steric">*</span></label>
                                <input type="date" name="start_date" class="form-control <?php echo e($errors->has('start_date') ? 'is-invalid' : ''); ?>"
                                    value="<?php echo e(old('start_date', \Carbon\Carbon::parse($auction->start_date)->format('Y-m-d'))); ?>">
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
                                <input type="date" name="end_date" class="form-control <?php echo e($errors->has('end_date') ? 'is-invalid' : ''); ?>"
                                    value="<?php echo e(old('end_date', \Carbon\Carbon::parse($auction->end_date)->format('Y-m-d'))); ?>">
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
                                <label class="form-label">Status</label>
                                <div>
                                    <input name="status" type="checkbox" data-toggle="toggle"
                                        <?php echo e($auction->status ? 'checked' : ''); ?>>
                                    <input type="hidden" name="status" id="status_hidden" value="<?php echo e($auction->status); ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Auction</button>
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
    $('input[name="status"]').change(function () {
        $('#status_hidden').val($(this).is(':checked') ? '1' : '0');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/car-auction/edit.blade.php ENDPATH**/ ?>