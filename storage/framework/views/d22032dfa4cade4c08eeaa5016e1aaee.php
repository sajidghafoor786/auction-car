
<?php $__env->startSection('title'); ?>
    Thank you!
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bodyContent'); ?>
  <div class="container">
    <div class="col-md-12 text-center py-5">
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>  
        <?php endif; ?>
        <h1>Thank You!</h1>
        <p>Your order id:  <span class="ms-1"><?php echo e($order->id); ?> </span></p>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/user/pages/thanks.blade.php ENDPATH**/ ?>