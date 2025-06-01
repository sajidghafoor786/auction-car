

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Cars /</span> Detail
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
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <?php if(!empty($car->name)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Name:</span>
                                        <span><?php echo e($car->name); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($car->make)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Make:</span>
                                        <span><?php echo e($car->make); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($car->model)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Model:</span>
                                        <span><?php echo e($car->model); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($car->year)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Year:</span>
                                        <span><?php echo e($car->year); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($car->description)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Description:</span>
                                        <span><?php echo e($car->description); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(!empty($car->image)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Image:</span><br>
                                        <img src="<?php echo e(asset('storage/' . $car->image)); ?>" alt="Car Image" style="max-width: 200px; height: auto;">
                                    </li>
                                <?php endif; ?>

                                <li class="mb-3">
                                    <span class="fw-medium me-2">Status:</span>
                                    <?php if($car->status == 1): ?>
                                        <span class="badge bg-label-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-label-danger">Inactive</span>
                                    <?php endif; ?>
                                </li>

                                <li class="mb-3">
                                    <span class="fw-medium me-2">Created At:</span>
                                    <span><?php echo e($car->created_at); ?></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/cars/view.blade.php ENDPATH**/ ?>