<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                      <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!

                </div>
                <div class="card-body">
                    <div class="panel-body">
                      Check admin view:
                      <a href="<?php echo e(route('admin.home')); ?>">Admin Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Shop\resources\views/home.blade.php ENDPATH**/ ?>