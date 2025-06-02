<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-style.css')); ?>">
</head>

<body data-instant-intensity="mousedown">
    <div id="preloader">
        <div class="spinner-wrapper">
            <div class="spinner"></div>
            <div >
                <i class="fa fa-car me-auto" style="text-align: center; display: block;"></i>
                <p >Auction</p>
            </div>
          
            </a>
        </div>
    </div>

    <?php echo $__env->make('frontend.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('frontend.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH D:\laragon\www\auction-car\resources\views/frontend/layout/app.blade.php ENDPATH**/ ?>