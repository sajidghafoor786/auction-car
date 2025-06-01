

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> Detail
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
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <?php if(!empty($auction->car)): ?>
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Car:</span>
                                    <span><?php echo e($auction->car->name); ?> (<?php echo e($auction->car->make); ?> - <?php echo e($auction->car->model); ?>)</span>
                                </li>
                            <?php endif; ?>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Minimum Bid:</span>
                                <span>PKR <?php echo e(number_format($auction->minimum_bid)); ?></span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Current Bid:</span>
                                <span>
                                    <?php if($auction->current_bid): ?>
                                        PKR <?php echo e(number_format($auction->current_bid)); ?>

                                    <?php else: ?>
                                        Not yet placed
                                    <?php endif; ?>
                                </span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Start Date:</span>
                                <span><?php echo e(\Carbon\Carbon::parse($auction->start_date)->format('d M Y h:i A')); ?></span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">End Date:</span>
                                <span><?php echo e(\Carbon\Carbon::parse($auction->end_date)->format('d M Y h:i A')); ?></span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Status:</span>
                                <?php if($auction->status === 'active'): ?>
                                    <span class="badge bg-label-success">Active</span>
                                <?php elseif($auction->status === 'closed'): ?>
                                    <span class="badge bg-label-danger">Closed</span>
                                <?php else: ?>
                                    <span class="badge bg-label-secondary">Unknown</span>
                                <?php endif; ?>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Created At:</span>
                                <span><?php echo e($auction->created_at->format('d M Y h:i A')); ?></span>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/car-auction/view.blade.php ENDPATH**/ ?>