<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?php echo e(asset('assets')); ?> /"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Dashboard | Auction Car</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.png')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/boxicons.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/fontawesome.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/flag-icons.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">


    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/demo.css')); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/animate-css/animate.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/tagify/tagify.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/quill/typography.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/quill/katex.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/pickr/pickr-themes.css')); ?>" />

    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/plugins/daterangepicker/daterangepicker.css')); ?>" />

    <!-- CKEDITOR -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/plugins/ckeditor5/ckeditor5.css')); ?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/admin-style.css')); ?>">

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="<?php echo e(asset('admin/assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- Helpers -->
    <script src="<?php echo e(asset('admin/assets/vendor/js/helpers.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/js/template-customizer.js')); ?>"></script>


    <style>
        .loader-wrapper {
            position: fixed;
            z-index: 999999;
            background: #3f3f3f59;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .loader-wrapper .theme-loader {
            height: 100px;
            width: 100px;
            position: relative;
        }

        .loader-wrapper .theme-loader .loader-p {
            border: 0 solid transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }

        .loader-wrapper .theme-loader .loader-p:before {
            content: "";
            border: 1em solid #14bedb;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-animation: loader 2s linear infinite;
            animation: loader 2s linear infinite;
            opacity: 0;
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }

        .app-brand.demo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .loader-wrapper .theme-loader .loader-p:after {
            content: "";
            border: 1em solid #14bedb;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-animation: loader 2s linear infinite;
            animation: loader 2s linear infinite;
            opacity: 0;
        }

        @-webkit-keyframes loader {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
            }
        }

        @keyframes loader {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
            }
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
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <?php echo $__env->make('admin.layout.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Layout container -->
            <div class="layout-page">

                <?php echo $__env->make('admin.layout.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <?php echo $__env->yieldContent('content'); ?>

                    <?php echo $__env->make('admin.layout.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="content-backdrop fade"></div>

                </div>
                <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js" crossorigin="anonymous"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/hammer/hammer.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/i18n/i18n.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/bloodhound/bloodhound.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/tagify/tagify.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/js/menu.js')); ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo e(asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>



    <script type="text/javascript" src="<?php echo e(asset('admin/assets/vendor/libs/moment/moment.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('admin/assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('admin/assets/vendor/libs/pickr/pickr.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('admin/assets/vendor/libs/jquery-repeater/jquery-repeater.js')); ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('admin/assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/forms-selects.js')); ?>"></script>

    <!-- Page JS -->
    <script src="<?php echo e(asset('admin/assets/js/dashboards-analytics.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/tables-datatables-advanced.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/extended-ui-sweetalert2.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/notification.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        $('.loader-wrapper').fadeOut('slow', function() {
            $(this).hide();
        });

        function markAllAsRead() {

            $.ajax({
                method: "POST",
                url: '#',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function(response) {
                    if (response.status == 1) {
                        getNotifications();
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "timeOut": "5000",
                " overlay": true,
                //    "extendedTimeOut" = "5000",
            };

            // Function to get Toastr options
            function getOptions() {
                toastr.options = toastr.options || {};
                return Object.assign({}, getDefaults(), toastr.options);
            }
            // showToast('success', 'Operation completed successfully');
            // Function to show Toastr message
            // console.log("Toastr code will execute next on the home page.");

            function showToast(status, message) {
                switch (status) {
                    case 'success':
                        toastr.success(message, 'Success!');
                        break;
                    case 'delete':
                        toastr.warning(message, 'Delete!');
                        break;
                    case 'warning':
                        toastr.warning(message, 'Warning!');
                        break;
                    case 'update':
                        toastr.info(message, 'Update!');
                        break;
                    case 'error':
                        toastr.error(message, 'Error!');
                        break;
                    default:
                        break;
                }
            }

            // Show Toastr message if session message exists
            <?php if(Session::has('message') && Session::has('status')): ?>
            showToast("<?php echo e(Session::get('status')); ?>", "<?php echo e(Session::get('message')); ?>");
            <?php endif; ?>
        });
    </script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>