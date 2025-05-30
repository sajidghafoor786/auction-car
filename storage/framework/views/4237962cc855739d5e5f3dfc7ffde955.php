<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="" />
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/slick.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(' assets/css/slick-theme.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset(' assets/css/video-js.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
    <style>
        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none !important;
        }

        /* custom.css */
        input.form-control {
            box-shadow: none !important;
            outline: none !important;
        }

        .form-check-input {
            box-shadow: none !important;
            outline: none !important;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none !important;
        }

        .page-item,
        .page-link {
            box-shadow: none !important;
            outline: none !important;
        }


        /* Customize toastr notification styles */
        .toast {

            margin-top: 10px !important;
            background-color: #4CAF50 !important;
            /* Set your desired background color */
            color: #fff !important;
            /* Set the text color to ensure visibility */
            /* white-space: nowrap !important; 
             overflow: hidden !important; */
        }

        .toast-error {
            background-color: #dc3545 !important;
            color: #fff !important;
            /* width: 370px !important; */
        }

        .toast-info {
            background-color: #17a2b8 !important;
            color: #fff !important;
            /* Set the text color to ensure visibility */
            /* white-space: nowrap !important;
            overflow: hidden !important; */
        }

        .toast-warning {
            background-color: #dc3545 !important;
            /* Red color for delete */
        }
        .CartIcon{
            border-radius: 60% !important;
            /* padding: 7px !important; */
            font-size: 12px !important;
        
        }
        .wishIcon{
            margin-left: 50px !important;
        }
      #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
      }

      .spinner {
        width: 60px;
        height: 60px;
        border: 6px solid #FFD700; /* Yellow border */
    border-top: 6px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0%   { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
   
    </style>
</head>

<body data-instant-intensity="mousedown">
<div id="preloader">
    <div class="spinner"></div>
  </div>
    <?php echo $__env->make('user.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('bodyContent'); ?>
    </main>

    <?php echo $__env->make('user.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH E:\laragon\www\SmartShop\resources\views/user/layout/app.blade.php ENDPATH**/ ?>