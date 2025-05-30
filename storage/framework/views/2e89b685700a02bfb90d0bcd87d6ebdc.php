 <!-- Javascript -->
 <script src="admin1/assets/plugins/popper.min.js"></script>
 <script src="admin1/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

 <!-- Charts JS -->
 <script src="admin1/assets/plugins/chart.js/chart.min.js"></script>
 <script src="admin1/assets/js/index-charts.js"></script>

 <!-- Page Specific JS -->
 <script src="admin1/assets/js/app.js"></script>

 <!-- animate file  -->

 <script src="admin1/assets/js/jquery-3.5.1.min.js"></script>

 <script src="admin1/assets/js/bootstrap.bundle.min.js"></script>

 <script src="admin1/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

 <script src="admin1/assets/vendor/wow/wow.min.js"></script>

 <script src="admin1/assets/js/theme.js"></script>
 <script src="admin1/assets/js/sweetalert.js"></script>
 <script>
     <?php if(session('massage')): ?>
    swal({
    title: "<?php echo e(session('massage')); ?>",
    icon: "<?php echo e(session('statuscode')); ?>",
    button: "OK",
    });
<?php endif; ?>
 </script><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/js.blade.php ENDPATH**/ ?>