<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <?php echo $__env->make('user.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-10  offset-md-1  border mb-5">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Cancel appointment</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row"><?php echo e($values->id); ?></th>
                            <td><?php echo e($values->Name); ?></td>
                            <td><?php echo e($values->Date); ?></td>
                            <td><?php echo e($values->Doctor_Name); ?></td>
                            <td>
                                <li class="nav-link ">
                                    <a class="nav-link btn btn-outline-danger text-Secondary"
                                        onclick="return confirm('Are you sure want to delete...')"
                                        href="<?php echo e(url('/cancel_appointment',$values->id)); ?>"> Cancel </a>
                                </li>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>




</body>

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/user/my_appointment.blade.php ENDPATH**/ ?>