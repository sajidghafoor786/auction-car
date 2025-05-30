<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    <base href="/public">
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
            <div class="row mt-5 ">
                <div class="col-md-8  offset-md-2   mb-5">
                    <div CLASS=" col-md-12 text-center  wow zoomIn  ">
                        <div class="app-card app-card-stat shadow-sm  ">
                            <div class="app-card-body bg-secondary">
                                <h1 class="text-light">UPDATE THE DOCTOR</h1>
                            </div>
                        </div>
                    </div>
                    <div class="app-card app-card shadow-sm wow fadeInRight ">
                        <div class="app-card-body p-3 ">
                            <form action="<?php echo e(url('Update_Process',$doctor->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label fs-5">Id</label>
                                    <input type="text" class="form-control" id="inputEmail12" value="<?php echo e($doctor->id); ?>"
                                        name="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label fs-5">Doctor Name</label>
                                    <input type="text" class="form-control" id="inputEmail12" value="<?php echo e($doctor->Name); ?>"
                                        name="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword12" class="form-label fs-5">Phone Number</label>
                                    <input type="number" class="form-control" id="inputPassword12" name="phone"
                                        value="<?php echo e($doctor->Phone); ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label fs-5">Room No</label>
                                    <input type="text" class="form-control" id="inputCity" name="room"
                                        value="<?php echo e($doctor->Room); ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label fs-5">Spacility</label>
                                    <select id="inputState" class="form-select" name="spacility"
                                        value="<?php echo e($doctor->spacility); ?>">
                                        <option selected>Choose...</option>
                                        <option>nose</option>
                                        <option>eye</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="inputCity" class="form-label fs-5"> Old image</label>
                                    <img src="Doctorimage/<?php echo e($doctor->image); ?>" alt="">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="inputCity" class="form-label fs-5"> Change image</label>
                                    <input type="file" class="form-control" id="inputCity" name="image">
                                </div>

                                <div class="col-12 mt-3   ">
                                    <button type="submit" class="btn btn-primary text-light fs-5">Update</button>
                                </div>

                            </form>
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

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/Update_Doctor.blade.php ENDPATH**/ ?>