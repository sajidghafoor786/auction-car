<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    <?php echo $__env->make('light_admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="app">
    <header class="app-header fixed-top">

        <?php echo $__env->make('light_admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-header-inner navbar-->

        <?php echo $__env->make('light_admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8 offset-md-2 mb-5">
                    <div class="app-card app-card-stat shadow-sm   wow fadeInRight ">
                        <div class="app-card-body  bg-secondary ">
                            <h1 class="text-light">VIEW YOUR APPOINTMENT</h1>
                        </div>
                    </div>

                    <div class="app-card app-card shadow-sm  wow zoomIn ">
                        <div class="app-card-body p-3 ">
                            <table class="table table-striped table-hover  wow zoomIn ">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Custmer_Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Stutas</th>
                                        <th scope="col">Approved</th>
                                        <th scope="col">Canceled</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($approve->id); ?></th>
                                        <td><?php echo e($approve->Name); ?></td>
                                        <td><?php echo e($approve->Date); ?></td>
                                        <td><?php echo e($approve->Phone); ?></td>
                                        <td><?php echo e($approve->Doctor_Name); ?></td>
                                        <td> <a href="<?php echo e(url('Approved',$approve->id)); ?>"
                                                class="btn btn-primary">Approved</a>
                                        </td>
                                        <td> <a href="<?php echo e(url('Canceled',$approve->id)); ?>"
                                                class="btn btn-danger">Canceled</a>
                                        </td>



                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--//app-footer-->
    </div>

    <?php echo $__env->make('light_admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--//app-wrapper-->



    <?php echo $__env->make('light_admin.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/showappointment.blade.php ENDPATH**/ ?>