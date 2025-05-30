<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  And css-->
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>


    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php echo $__env->make('admin.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial  Navbar-->
        <?php echo $__env->make('admin.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial body -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row mt-5 bg-white">
                        <div class="col-10  offset-md-1   mb-5">

                            <table class="table table-striped table-hover">
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
                                        <td> <a href="<?php echo e(url('Approved',$approve->id)); ?>" class="btn btn-primary">Approved</a> </td>
                                        <td> <a href="<?php echo e(url('Canceled',$approve->id)); ?>" class="btn btn-danger">Canceled</a> </td>
                                      
                                       
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                </tbody>
                          
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- container-scroller end -->
    </div>

    <!-- plugins:js -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/admin/showappointment.blade.php ENDPATH**/ ?>