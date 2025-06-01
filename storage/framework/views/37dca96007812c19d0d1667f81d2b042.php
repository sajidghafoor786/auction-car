<?php $__env->startSection('title'); ?>
profile account
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                <li class="breadcrumb-item">Settings</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-11 ">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3">
                <?php echo $__env->make('frontend.account.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?php echo e(route('user.profileUpdate')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" value="<?php echo e($user->id); ?>" name="id">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="<?php echo e($user->name); ?>" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" value="<?php echo e($user->email); ?>" disabled name="email" id="email" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="<?php echo e($user->phone); ?>" id="phone" placeholder="Enter Your Phone" class="form-control">
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-dark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/frontend/account/profile.blade.php ENDPATH**/ ?>