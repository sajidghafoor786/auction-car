<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/pages/ecommerce/orders/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Feb 2024 04:53:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>


    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />

    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, material dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, material design, material dashboard bootstrap 5 dashboard">
    <meta name="description"
        content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
        content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="../../../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url"
        content="https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/default.html" />
    <meta property="og:image"
        content="../../../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg" />
    <meta property="og:description"
        content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="<?php echo e(asset('admin-2/assets-2/css/nucleo-icons.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('admin-2/assets-2/css/nucleo-svg.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="<?php echo e(asset('admin-2/assets-2/css/material-dashboard.minaf3e.css?v=3.0.6')); ?>"
        rel="stylesheet" />
    <link id="pagestyle" href="<?php echo e(asset('admin-2/assets-2/css/datetimepicker.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <style>
        /* Customize toastr notification styles */
        .toast {

            margin-top: 10px !important;
            background-color: #4CAF50 !important;
            /* Set your desired background color */
            color: #fff !important;
            /* Set the text color to ensure visibility */
            white-space: nowrap !important;
            overflow: hidden !important;
        }

        .toast-error {
            background-color: #dc3545 !important;
            color: #fff !important;
            /* Set the text color to ensure visibility */
            white-space: nowrap !important;
            overflow: hidden !important;
        }

        .toast-info {
            background-color: #17a2b8 !important;
            color: #fff !important;
            /* Set the text color to ensure visibility */
            white-space: nowrap !important;
            overflow: hidden !important;
        }

        .toast-warning {
            background-color: #dc3545 !important;
            /* Red color for delete */
        }

        /* product modal show bg  */
        .bg {
            background: #efeff5;
        }

        .input-group.input-group-static .form-control:not(:first-child) {
            padding-left: 5px !important;
        }

        .dataTable-table>thead>tr>th {
            vertical-align: bottom !important;
            text-align: center !important;
        }
      .fontSize{
        font-size: 10px !important;
      }
      .size{
        padding-top: 12px !important;
      }

      
    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <script defer data-site="demos.creative-tim.com" src="../../../../../api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div class="wrapper ">
        
        <?php echo $__env->make('admin/include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            
            <?php echo $__env->make('admin/include.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="content">
                
                <?php echo $__env->yieldContent('body'); ?>
            </div>
        </main>

    </div>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>

            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">

                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>

                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Sidenav Mini</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize"
                            onclick="navbarMinimize(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-primary w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro">Buy
                    now</a>
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard">Free
                    demo</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-pro"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard-pro"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/smooth-scrollbar.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/dragula/dragula.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/jkanban/jkanban.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-2/assets-2/js/plugins/datetimepicker.js')); ?>"></script>

    <?php echo $__env->yieldContent('jsCode'); ?>
    <script>
        //  onclick change image and multipe image
        $(document).ready(function() {
            // Handle change event of the new image input
            $('.Image').change(function() {
                var input = $(this)[0];
                if (input.files && input.files.length > 0) {
                    // Clear existing previews and cards
                    $('.ImagesContainer');

                    // Loop through selected files and display cards
                    for (var i = 0; i < input.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // Display the card with image preview and delete button
                            var card =
                                '<div class="card" style="width: 150px; margin-right: 10px; margin-bottom: 10px;">' +
                                '<img src="' + e.target.result +
                                '" class="card-img-top" alt="Preview " style="width: 100%; object-fit: contain;">' +
                                '<div class="card-body text-center">' +
                                '<button type="button" class="btn btn-danger deleteImage">Delete</button>' +
                                '</div></div>';

                            $('.ImagesContainer').append(card);
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            });

            // Handle click event for the delete button
            $('.ImagesContainer').on('click', '.deleteImage', function() {
                // Remove the corresponding card on delete button click
                $(this).closest('.card').remove();
                // Clear the file input when deleting an image
                var input = $('.Image'); // Replace 'newImage' with the actual ID of your file input
                input.val(''); // Clear the value
                input.trigger('change'); // Trigger change event to update the file input
                // If you want to remove the preview of the deleted image, you can do so here
                // Check if there are remaining images
                var remainingImages = $('.ImagesContainer .card').length;
                // if (remainingImages === 0) {
                //     input.hide(); // Hide the file input if there are no remaining images
                // }
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "timeOut": "3000",
            };

            // Function to get Toastr options
            function getOptions() {
                toastr.options = toastr.options || {};
                return Object.assign({}, getDefaults(), toastr.options);
            }

            // Function to show Toastr message
            function showToast(status, message) {
                switch (status) {
                    case 'success':
                        // console.log("Toastr code will execute next on the home page.");
                        toastr.success(message, 'Success!');
                        break;
                    case 'delete':
                        toastr.warning(message, 'Delete!');
                        break;
                    case 'warning':
                        toastr.warning(message, 'Warning!');
                        break;
                    case 'error':
                        toastr.error(message, 'Error!');
                        break;
                    case 'update':
                        toastr.info(message, 'Update!');
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
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: false
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "material-" + type,
                };

                if (type === "csv") {
                    data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="../../../../../buttons.github.io/buttons.js"></script>

    <script src="<?php echo e(asset('admin-2/assets-2/js/material-dashboard.minaf3e.js?v=3.0.6')); ?>"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"8552b53d0b4b3c8f","b":1,"version":"2024.2.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
        
</body>

</html>
<?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>