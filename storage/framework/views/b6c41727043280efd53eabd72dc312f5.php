<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?php echo e(asset('assets')); ?> /"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Dashboard | Hajj Finder</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.png')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/boxicons.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/fontawesome.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/demo.css')); ?>" />


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/vendor/css/rtl/core.css')); ?>" class="template-customizer-core-css" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/vendor/css/rtl/theme-default.css')); ?>" class="template-customizer-theme-css" />


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

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('admin/assets/js/config.js')); ?>"></script>
    <style>
        #notification-append {
            height: auto;
            max-height: 300px;
            overflow-y: scroll;
            padding: 15px 15px 15px 15px;
        }

        #notification-append a.dropdown-item {
            padding: 0;
            color: #000;
            text-decoration: none;
        }
        #notification-append span {
            padding: 0;
            color: grey;
            text-decoration: none;
        }

        #notification-append hr:last-child {
            display: none;
        }

        .count-notification{
            border-radius: 24%;
            padding: 2px 4px;
            font-weight: bold;
        }
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

        .ck-powered-by-balloon{
            display: none !important;
        }

        .input-group-text {
            height: 38px; /* Adjust to match input field */
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .address_icon {
            position: relative;
            display: inline-block;
        }

        .address_icon input {
            padding-right: 30px; /* Adjust padding to make space for the icon */
        }

        .address_icon .bx {
            position: absolute;
            top: 35px;
            right: 25px;
            transform: translateY(20%);
            font-size: 20px;/* Adjust color as needed */
        }

        .address_icon .bx:hover {
            color: #000; /* Change color on hover */
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

        <?php echo $__env->make('layout.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Layout container -->
        <div class="layout-page">

        <?php echo $__env->make('layout.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content wrapper -->
         <div class="content-wrapper">

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layout.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.google.api_key')); ?>&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"></script>
        <script type="importmap">
            {
                "imports": {
                    "ckeditor5": "<?php echo e(asset("assets/plugins/ckeditor5/ckeditor5.js")); ?>",
                    "ckeditor5/": "<?php echo e(asset("assets/plugins/ckeditor5/")); ?>"
                }
            }
        </script>
        <script>
            var editors = []
            let uploadImageRoute = "";
        </script>
        <script type="module" src="<?php echo e(asset('assets/js/ck-editor.js')); ?>"></script>
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

<?php if(in_array(Route::currentRouteName(),['createBooking','editBooking'])): ?>
<script>

    let dateOptions = {
        allowInputToggle: true,
        display: {
            components: {
            calendar: true,
            date: true,
            month: true,
            year: true,
            decades: true,
            clock: false
        }
        },
        localization: {
            format: 'dd-MM-yyyy',
        },
        restrictions: {
            minDate: '<?php echo e(date('d-m-Y')); ?>'
        }
    }

    let timeOptions = {
        allowInputToggle: true,
        display: {
            components: {
            calendar: false,
            date: true,
            month: true,
            year: true,
            decades: true,
            clock: true
        }
        },
        localization: {
            hourCycle: 'h23',
            format: 'HH:mm',
        },
        restrictions: {
            minDate: '<?php echo e(date('H:i')); ?>'
        }
    }

    const later = new tempusDominus.DateTime();
    later.hours = 8;

    const mileage_date = new tempusDominus.TempusDominus(document.getElementById('date'),dateOptions);
    // const return_date = new tempusDominus.TempusDominus(document.getElementById('return_date'),dateOptions);

    const mileage_time = new tempusDominus.TempusDominus(document.getElementById('time'),timeOptions);
    // const return_time = new tempusDominus.TempusDominus(document.getElementById('return_time'),timeOptions);
</script>

<?php endif; ?>

<script>
        function initializeAutocomplete(input, options) {

            const autocomplete = new google.maps.places.Autocomplete(input, options);
            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");
            infowindow.setContent(infowindowContent);
            autocomplete.addListener("place_changed", () => {
                // console.log(input.name);
                infowindow.close();
                const place = autocomplete.getPlace();
                // console.log(place);
                if (!place.geometry || !place.geometry.location) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                let placeTypes = place.types;
                if (input.id === "from") {
                    document.getElementById("from_lat").value = place.geometry.location.lat();
                    document.getElementById("from_lng").value = place.geometry.location.lng();
                    document.getElementById("from_type").value = "";

                    placeTypes.forEach(function(item) {
                        if (item === "airport") {
                            document.getElementById("from_type").value = "airport";
                        }
                    })
                } else if (input.id === "to_add") {
                    document.getElementById("to_lat").value = place.geometry.location.lat();
                    document.getElementById("to_lng").value = place.geometry.location.lng();
                    document.getElementById("to_type").value = "";

                    placeTypes.forEach(function(item) {
                        if (item === "airport") {
                            document.getElementById("to_type").value = "airport";
                        }
                    })

                }
                else if (input.id === "end_location") {
                    document.getElementById("end_location_lat").value = place.geometry.location.lat();
                    document.getElementById("end_location_lng").value = place.geometry.location.lng();
                    document.getElementById("end_location_type").value = "";

                    placeTypes.forEach(function(item) {
                        if (item === "airport") {
                            document.getElementById("end_location_type").value = "airport";
                        }
                    })
                }
                else if (input.id === "flat_rate") {
                    const toLat = document.getElementById("flat_rate_lat").value;
                    const toLng = document.getElementById("flat_rate_lng").value;

                    document.getElementById("flat_rate_lat").value = toLat;
                    document.getElementById("flat_rate_lng").value = toLng;
                    

                    

                }
                else if (input.name === "via_location[]") {
                    let parentEl = input.parentElement;
                    placeTypes.forEach(function(item) {
                        if (item === "airport") {
                            var newInput = document.createElement('input');
                            newInput.type = 'hidden';
                            newInput.name = 'via_type[]';
                            newInput.value = 'airport';
                            newInput.required = true;

                            parentEl.appendChild(newInput);
                        }
                    })

                }
            });
        }
    // function initializeAutocomplete(input, options) {
    //     const autocomplete = new google.maps.places.Autocomplete(input, options);
    //     const infowindow = new google.maps.InfoWindow();
    //     const infowindowContent = document.getElementById("infowindow-content");
    //     infowindow.setContent(infowindowContent);
    //     autocomplete.addListener("place_changed", () => {
    //         infowindow.close();
    //         const place = autocomplete.getPlace();
    //         if (!place.geometry || !place.geometry.location) {
    //             window.alert("No details available for input: '" + place.name + "'");
    //             return;
    //         }

    //         let placeTypes = place.types;

    //         if (input.id === "from") {
    //                 document.getElementById("from_lat").value = place.geometry.location.lat();
    //                 document.getElementById("from_lng").value = place.geometry.location.lng();
    //                 document.getElementById("from_type").value = "";

    //                 placeTypes.forEach(function (item) {
    //                     if(item === "airport"){
    //                         document.getElementById("from_type").value = "airport";
    //                     }
    //                 })

    //             } else if (input.id === "to_add") {
    //                 document.getElementById("to_lat").value = place.geometry.location.lat();
    //                 document.getElementById("to_lng").value = place.geometry.location.lng();
    //                 document.getElementById("to_type").value = "";

    //                 placeTypes.forEach(function (item) {
    //                     if(item === "airport"){
    //                         document.getElementById("to_type").value = "airport";
    //                     }
    //                 })
    //             }else if (input.name === "via_location[]") {
    //                 let parentEl = input.parentElement;
    //                 placeTypes.forEach(function (item) {
    //                     if(item === "airport"){
    //                         var newInput = document.createElement('input');
    //                         newInput.type = 'hidden';
    //                         newInput.name = 'via_type[]';
    //                         newInput.value = 'airport';
    //                         newInput.required = true;

    //                         parentEl.appendChild(newInput);
    //                     }
    //                 })

    //             }
    //     });
    // }

    const inputs = [document.getElementById("from"), document.getElementById("to_add"),document.getElementById("end_location")];

    const options = {
                componentRestrictions: {
                    country: 'us'
                },
                strictBounds: false,
        };

    inputs.forEach(input => {
        initializeAutocomplete(input, options);
    });

      // Wait for the DOM to be fully loaded
      document.addEventListener('DOMContentLoaded', function() {
                const fromInput = document.getElementById('from');
                const toAddInput = document.getElementById('to_add');
                const flateRateInput = document.getElementById('flat_rate');
                const endLocationInput = document.getElementById('end_location');

                toggleClearIcon('from', fromInput.value.trim());
                toggleClearIcon('to_add', toAddInput.value.trim());
                toggleClearIcon('flat_rate', flateRateInput.value.trim());
                toggleClearIcon('end_location', endLocationInput.value.trim());

                fromInput.addEventListener('input', function() {
                    toggleClearIcon('from', this.value.trim());
                });

                toAddInput.addEventListener('input', function() {
                    toggleClearIcon('to_add', this.value.trim());
                });
                flateRateInput.addEventListener('input', function() {
                    toggleClearIcon('flat_rate', this.value.trim());
                });
                endLocationInput.addEventListener('input', function() {
                    toggleClearIcon('end_location', this.value.trim());
                });

            });

    function toggleClearIcon(id, hasValue) {

        const clearIcon = document.getElementById(`clear-${id}`);
        if (hasValue) {
            clearIcon.style.display = 'inline-block';
        } else {
            clearIcon.style.display = 'none';
        }
    }

    function clearInput(id) {
        const input = document.getElementById(id);
        input.value = '';
        toggleClearIcon(id, false);
        $('#'+id).trigger('keyup')
    }

    $('#from').on('keyup',function(){
        $('#from_lat').val('');
        $('#from_lng').val('');
        $('#from_type').val('');
    });

    $('#to_add').on('keyup',function(){
        $('#to_lat').val('');
        $('#to_lng').val('');
        $('#to_type').val('');
    });

    $('#flat_rate').on('keyup',function(){
        $('#flat_rate_lat').val('');
        $('#flat_rate_lng').val('');
    });

    $('#end_location').on('keyup',function(){
        $('#end_location_lat').val('');
        $('#end_location_lng').val('');
    });
</script>





<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\auction-car\resources\views/layout/admin.blade.php ENDPATH**/ ?>