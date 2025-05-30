
<?php $__env->startSection('title'); ?>
    WishList
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bodyContent'); ?>
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
                    <?php echo $__env->make('user.account.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                        </div>
                        <div class="card-body p-4">
                            <?php if($wishlist->isNotEmpty()): ?>
                                <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product = ProductDetails($item->product_id);
                                        $product_img = getProductImage($item->product_id);
                                    ?>
                                    <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                        <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                            <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#"
                                                style="width: 10rem;">
                                                <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                    alt="Product">
                                            </a>
                                            <div class="pt-2">
                                                <h3 class="product-title fs-base mb-2">
                                                    <a href="shop-single-v1.html"><?php echo e($product->title); ?></a>
                                                </h3>
                                                <div class="fs-lg text-accent pt-2"><?php echo e($product->price); ?>/PKR</div>
                                            </div>
                                        </div>
                                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deleteItem('<?php echo e($item->id); ?>')">
                                                <i class="fas fa-trash-alt me-2"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2 text-center"><a href="#">Not Any product in
                                            wishlist</a></h3>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custemjs'); ?>
    <script>
        function deleteItem(id) {
            if (confirm('Arew you Sure want to delete Item from Wishlist')) {
                $.ajax({
                    // alert('sajid');
                    url: '<?php echo e(route('user.delete-wislist')); ?>', // Replace with your actual route
                    type: 'POST',
                    data: {
                        Id: id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.status === true) {
                            // Delay the redirection by 5 seconds
                            toastr.error(response.message, 'Error!');
                            setTimeout(function() {
                                window.location.href = "<?php echo e(route('user.wishlist')); ?>";
                            }, 5000);
                        } else {
                            toastr.error('something went Wrong', 'Error!');


                        }


                    }

                });

            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/user/pages/wishlist.blade.php ENDPATH**/ ?>