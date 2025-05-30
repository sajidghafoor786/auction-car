
<?php $__env->startSection('title'); ?>
    E-SHOP
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bodyContent'); ?>
    <?php echo $__env->make('user.include.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.include.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/user/index.blade.php ENDPATH**/ ?>