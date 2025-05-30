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
            <div class="row  py-5 mt-5">
                <div class="col-8  offset-md-2   mb-5">
                    <div CLASS=" col-md-12 text-center bg-secondary wow fadeInRight  ">
                        <h1 class="text-light">VIEW THE DOCTOR</h1>
                    </div>
                    <div class="app-card app-card shadow-sm  wow zoomIn ">
                        <div class="app-card-body p-3 ">
                            <table class="table table-striped table-hover  wow zoomIn">
                                <thead>
                                    <tr>

                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">spacility</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>

                                     
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <th scope="row"><?php echo e($values->id); ?></th>
                                        <td><?php echo e($values->Name); ?></td>
                                        <td><?php echo e($values->Phone); ?></td>
                                        <td><?php echo e($values->Room); ?></td>
                                        <td><?php echo e($values->spacility); ?></td>
                                        <td><img class="w-50" src="Doctorimage/<?php echo e($values->image); ?>" alt=""></td>
                                        <td><a href="<?php echo e(url('Delete_Doctor',$values->id)); ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td><a href="<?php echo e(url('Update_Doctor',$values->id)); ?>"
                                                class="btn btn-primary">Update</a>
                                        </td>




                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php echo $__env->make('light_admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--//app-footer-->
    </div>
    <!--//app-wrapper-->



    <?php echo $__env->make('light_admin.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/showalldoctor.blade.php ENDPATH**/ ?>