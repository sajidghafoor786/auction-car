

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Users /</span> Detail
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="<?php echo e(route('admin.listUsers')); ?>" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <?php if(!empty($user->name)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Username:</span>
                                        <span><?php echo e($user->name); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if(!empty($user->email)): ?>
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Email:</span>
                                        <span><?php echo e($user->email); ?></span>
                                    </li>
                                <?php endif; ?>
                               
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Phone:</span>
                                        <span><?php echo e($user->phone ?? 'N/A'); ?></span>
                                    </li>
                             
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Type:</span>
                                    <?php if($user->user_type == 1): ?>
                                        <span class="badge bg-label-success"><?php echo e('Admin'); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-label-danger"><?php echo e('User'); ?></span>
                                    <?php endif; ?>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Status:</span>
                                    <?php if($user->status == 1): ?>
                                        <span class="badge bg-label-success"><?php echo e('Active'); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-label-danger"><?php echo e('Inactive'); ?></span>
                                    <?php endif; ?>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Joining:</span>
                                  <span><?php echo e($user->created_at); ?></span>
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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/admin-user/view.blade.php ENDPATH**/ ?>