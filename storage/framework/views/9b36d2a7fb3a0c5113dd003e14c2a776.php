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

        <div class="container pt-5">
            <div class="row mt-5">
                <div class=" col-md-8 offset-md-2 g-4 mb-4">
                    <div class="app-card app-card-stat shadow-sm   wow fadeInRight ">
                        <div class="app-card-body  ">
                            <div CLASS="text-center bg-secondary">
                                <h1 class="text-light">ADD YOUR DOCTOR</h1>
                            </div>
                        </div>
                    </div>

                    <div class="app-card app-card shadow-sm  wow zoomIn ">
                        <div class="app-card-body p-3 ">
                            <form action="<?php echo e(url('upload_doctor')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label  fs-5">Doctor Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your Doctor Name"
                                        id="inputEmail12" name="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword12" class="form-label fs-5">Phone number</label>
                                    <input type="number" class="form-control" placeholder="Enter your Doctor Phone No"
                                        id="inputPassword12" name="phone">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label fs-5">Room No</label>
                                    <input type="text" class="form-control" id="inputCity"
                                        placeholder="Enter your Doctor Room " name="room">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label fs-5">Spacility</label>
                                    <select id="inputState" class="form-select"
                                        placeholder="Enter your Doctor Spacility" name="spacility">
                                        <option selected>Choose...</option>
                                        <option>nose</option>
                                        <option>eye</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label fs-5">Image</label>
                                    <input type="file" class="form-control" id="inputCity" name="image">
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary fs-5 mb-3 text-light">save </button>
                                </div>

                            </form>
                            <!--//app-content body-->

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

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/add_doctor.blade.php ENDPATH**/ ?>