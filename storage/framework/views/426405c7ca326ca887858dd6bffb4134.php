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

    <div class="container pt-5">
            <div class="row mt-5">
                <div class=" col-md-8 offset-md-2 g-4 mb-4">
                    <div class="app-card app-card-stat shadow-sm   wow fadeInRight ">
                        <div class="app-card-body  ">
                            <div CLASS="text-center bg-secondary">
                                <h1 class="text-light">Add New Item</h1>
                            </div>
                        </div>
                    </div>

                    <div class="app-card app-card shadow-sm  wow zoomIn ">
                        <div class="app-card-body p-3 ">
                            <form action="<?php echo e(url('Item_Data')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="inputEmail12" class="form-label  fs-5"> Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Item  Name"
                                        id="inputEmail12" name="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputPassword12" class="form-label fs-5">Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Link"
                                        id="inputPassword12" name="link">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label fs-5">Stutas</label>
                                    <select id="inputState" class="form-select"
                                        placeholder="Enter Stutas Enable/Disable" name="stutas">
                                        <option selected>Choose...</option>
                                        <option>Disable</option>
                                        <option>Enable</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary fs-5 mb-3 text-light">Save Changing </button>
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

</html><?php /**PATH C:\xampp\htdocs\laravel2\resources\views/light_admin/MenuItem.blade.php ENDPATH**/ ?>