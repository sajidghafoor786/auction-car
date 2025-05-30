<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  And css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>


    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php echo $__env->make('admin.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial  Navbar-->
        <?php echo $__env->make('admin.Navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <div class="content-wrapper form-control">
                <?php if(session()->has('massage')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data_dismiss="alert">x</button>
                     <?php echo e((session()->get('massage'))); ?>



                    </div>
                
                <?php endif; ?>
                <form action="<?php echo e(url('upload_doctor')); ?>" method="POST"  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                        <div class="col-md-12">
                            <label for="inputEmail12" class="form-label">Doctor Name</label>
                            <input type="text" class="form-control" id="inputEmail12" name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword12" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="inputPassword12" name="phone">
                        </div>
                      
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">Room no</label>
                            <input type="text" class="form-control" id="inputCity" name="room">
                        </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">spacility</label>
                            <select id="inputState" class="form-select" name="spacility">
                                <option selected>Choose...</option>
                                <option>nose</option>
                                <option>eye</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">image</label>
                            <input type="file" class="form-control" id="inputCity"  name="image">
                        </div>
                       
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">add </button>
                        </div>
                   
                </form>
            </div>
            <!-- main-panel ends -->
        </div>



    </div>



    <!-- plugins:js -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/admin/add_doctor.blade.php ENDPATH**/ ?>