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
            <!-- Vertically centered modal -->

            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label fs-5">Id</label>
                                    <input type="text" value="" name="id" class="form-control" id="inputEmail12">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label fs-5">Doctor Name</label>
                                    <input type="text" class="form-control" id="inputEmail12" value="" name="">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputState" class="form-label fs-5">Spacility</label>
                                    <select id="inputState" class="form-select" name="spacility" value="">
                                        <option selected>Choose...</option>
                                        <option>nose</option>
                                        <option>eye</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-3   ">
                                    <button type="submit" class="btn btn-primary text-light fs-5">Update</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ---- row---- -->
            <div class="row  py-5 mt-5">
                <div class="col-8  offset-md-2   mb-5">
                    <div CLASS=" col-md-12 text-center bg-secondary wow fadeInRight  ">
                        <h1 class="text-light">YOU CAN MAKE THE ADMIN/USER</h1>
                    </div>
                    <div class="app-card app-card shadow-sm  wow zoomIn ">
                        <div class="app-card-body p-3 ">
                            <table class="table table-striped table-hover  wow zoomIn">
                                <thead>
                                    <tr>

                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">usertype</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>



                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <th scope="row"><?php echo e($values->id); ?></th>
                                        <td><?php echo e($values->name); ?></td>

                                        <td>
                                            <?php if( $values->usertype =="0"): ?>
                                            Admin

                                            <?php elseif($values->usertype =="1"): ?>

                                            user
                                            <?php else: ?>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo e($values->email); ?></td>
                                        <td><a href="<?php echo e(url('Admin_data',$values->id)); ?>" class="btn btn-primary">Admin</a>
                                        <td><a href="<?php echo e(url('User_data',$values->id)); ?>" class="btn btn-info">user</a>

                                        </td>
                                        <td><a href="<?php echo e(url('Delete',$values->id)); ?>" class="btn btn-danger">Delete</a>
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

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/admin_setting.blade.php ENDPATH**/ ?>