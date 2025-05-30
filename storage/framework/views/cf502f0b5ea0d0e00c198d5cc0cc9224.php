<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  And css-->
    <base href="/public">
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
                    <div class="row mt-5 ">
                        <div class="col-10  offset-md-1   mb-5">

                        <form action="<?php echo e(url('Update_Process',$doctor->id)); ?>" method="POST"  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                        <div class="col-md-12">
                            <label for="inputEmail12" class="form-label">Id</label>
                            <input type="text" class="form-control" id="inputEmail12" value="<?php echo e($doctor->id); ?>" name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail12" class="form-label">Doctor Name</label>
                            <input type="text" class="form-control" id="inputEmail12" value="<?php echo e($doctor->Name); ?>" name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword12" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="inputPassword12" name="phone" value="<?php echo e($doctor->Phone); ?>">
                        </div>
                      
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">Room no</label>
                            <input type="text" class="form-control" id="inputCity" name="room" value="<?php echo e($doctor->Room); ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">spacility</label>
                            <select id="inputState" class="form-select" name="spacility" value="<?php echo e($doctor->spacility); ?>">
                                <option selected>Choose...</option>
                                <option>nose</option>
                                <option>eye</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label" > Old image</label>
                               <img src="Doctorimage/<?php echo e($doctor->image); ?>" alt="">
                        </div>
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label"> Change image</label>
                            <input type="file" class="form-control" id="inputCity"  name="image" >
                        </div>
                       
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                   
                </form>
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

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/admin/Update_Doctor.blade.php ENDPATH**/ ?>