
<?php $__env->startSection('title'); ?>
    E-SHOP Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    orderDetails
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
   
    </div>
    <div class="container-fluid py-4">
        <div class="row mx-auto">
            <div class="col-lg-8 ">
                <div class="card mb-4">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="w-50">
                                <h6>Order Details</h6>
                                <p class="text-sm mb-0">
                                    Order no. <b>OR#<?php echo e($order->id); ?></b> from
                                    <b><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('d F, Y')); ?></b>
                                </p>
                                <p class="text-sm">
                                    <strong>Shipped date</strong>: <br>
                                    <span>
                                        <?php if(!empty($order->shipping_date)): ?>
                                            <?php echo e(\Carbon\Carbon::parse($order->shipping_date)->format('d F, Y')); ?>

                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </span>
                                </p>
                            </div>
                            <a href="<?php echo e(route('orderList')); ?>" class="btn bg-gradient-dark ms-auto mb-0">Back</a>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <hr class="horizontal dark mt-0 mb-4">
                        <div class="row">
                            <?php if($orderItems->isNotEmpty()): ?>
                                <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3 col-md-3 col-12 m-3">
                                        <div class="d-flex">
                                            <?php
                                                $product_img = getProductImage($orderItem->product_id);
                                            ?>
                                            <div>
                                                <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                    class="avatar avatar-xxl me-3" alt="product image">
                                            </div>
                                            <div>
                                                <h6 class="text-lg mb-0 mt-2"><?php echo e($orderItem->name); ?></h6>
                                                <p class="text-sm mb-0">
                                                    <?php echo e(\Carbon\Carbon::parse($orderItem->created_at)->format('d F, Y')); ?>

                                                </p>
                                                <p class="text-sm mb-0 ">
                                                    Price: <?php echo e($orderItem->price); ?>, Qty:<?php echo e($orderItem->qty); ?>

                                                </p>
                                                <?php if($order->order_status == 'pending'): ?>
                                                    <span class="badge badge-sm bg-gradient-info">
                                                        pending
                                                    </span>
                                                <?php elseif($order->order_status == 'shipping'): ?>
                                                    <span class="badge badge-sm bg-gradient-warning">
                                                        Shipping
                                                    </span>
                                                <?php elseif($order->order_status == 'cancelled'): ?>
                                                    <span class="badge badge-sm bg-gradient-danger">
                                                        Cancelled
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        Delivered
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </div>
                        <hr class="horizontal dark mt-4 mb-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <h6 class="mb-3">Track order</h6>
                                <div class="timeline timeline-one-side">
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">notifications</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order received</h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                <?php echo e(\Carbon\Carbon::parse($orderItem->created_at)->format('d F, Y')); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">code</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Generate order id
                                                OR#<?php echo e($order->id); ?>

                                            </h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                <?php echo e(\Carbon\Carbon::parse($order->shipping_date)->format('d F, Y')); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">shopping_cart</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order transmited to courier
                                            </h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                <?php if(!empty($order->shipping_date)): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($order->shipping_date)->format('d F, Y')); ?>

                                                <?php else: ?>
                                                    N/A
                                                    <p>please wait</p>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-success text-gradient text-lg">done</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order delivered</h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 4:54 PM
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                
                                <h6 class="mb-3 mt-4">Billing Information</h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm"><?php echo e($order->f_name); ?></h6>
                                            <span class="mb-2 text-xs">Last Name: <span
                                                    class="text-dark font-weight-bold ms-2"><?php echo e($order->last_name); ?></span></span>
                                            <span class="mb-2 text-xs">Email Address: <span
                                                    class="text-dark ms-2 font-weight-bold"><a
                                                        class="__cf_email__"><?php echo e($order->email); ?></a></span></span>
                                            <span class="text-xs">Phone Number: <span
                                                    class="text-dark ms-2 font-weight-bold"><?php echo e($order->phone_no); ?></span></span>
                                            <span class="text-xs">Country : <span
                                                    class="text-dark ms-2 font-weight-bold"><?php echo e($order->CountryName); ?></span></span>
                                            <span class="text-xs">City : <span
                                                    class="text-dark ms-2 font-weight-bold"><?php echo e($order->city); ?></span></span>
                                            <span class="text-xs">Address : <span
                                                    class="text-dark ms-2 font-weight-bold"><?php echo e($order->address); ?></span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-12 ms-auto">
                                <h6 class="mb-3">Order Summary</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Total Price:
                                    </span>
                                    <span
                                        class="text-dark font-weight-bold ms-2"><?php echo e(number_format($order->subtotal, 2)); ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Delivery:
                                    </span>
                                    <span
                                        class="text-dark ms-2 font-weight-bold"><?php echo e(number_format($order->shipping, 2)); ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm">
                                        Discount:
                                    </span>
                                    <span
                                        class="text-dark ms-2 font-weight-bold"><?php echo e(number_format($order->discount, 2)); ?></span>
                                </div>
                                <hr class="horizontal dark mt-4 mb-4">
                                <div class="d-flex justify-content-between mt-4">
                                    <span class="mb-2 text-lg">
                                        Total:
                                    </span>
                                    <span
                                        class="text-dark text-lg ms-2 font-weight-bold"><?php echo e(number_format($order->subtotal, 2)); ?>/PKR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card ">
                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post" id="order_update_form">
                        <?php echo csrf_field(); ?>
                        <div class="card-body pb-0">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Order Status</h5>
                                </label>
                                <select class="form-control" name="orderStatus">
                                    <option value="pending" <?php echo e($order->order_status == 'pending' ? 'selected' : ' '); ?>>
                                        pending</option>
                                    <option value="shipping" <?php echo e($order->order_status == 'shipping' ? 'selected' : ' '); ?>>
                                        shipping</option>
                                    <option value="delivered"
                                        <?php echo e($order->order_status == 'delivered' ? 'selected' : ' '); ?>>delivered</option>
                                    <option value="cancelled"
                                        <?php echo e($order->order_status == 'cancelled' ? 'selected' : ' '); ?>>
                                        cancelled</option>
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Shipping_Date</h5>
                                </label>
                                <input type="text" class="form-control" value="<?php echo e($order->shipping_date); ?>"
                                    name="shippe_date" id="shipping_date" required placeholder="shipping date"
                                    autocomplete="off" min="<?php echo e(now()->toIso8601String()); ?>">

                            </div>
                            
                            <div>
                                <span id="shippe_date_error" class="text-danger"></span>
                            </div>

                        </div>
                        <div class="ms-3">
                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card mt-3">
                    <form action="<?php echo e(route('sendInvoce_email', $order->id)); ?>" method="post" id="Invoice_Send">
                        <?php echo csrf_field(); ?>
                        <div class="card-body pb-0">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Send Invoice</h5>
                                </label>
                                <select class="form-control" name="userType">
                                    <option value="Customer">Customer</option>
                                    <option value="Admin">Admin</option>

                                </select>
                            </div>

                        </div>
                        <div class="ms-3">
                            <button type="submit" class="btn bg-gradient-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
    
    <script>
        $(document).ready(function() {
            $('#shipping_date').datetimepicker({
                // options here
                format: 'Y-m-d H:i:s',
            });
        });
        $(document).ready(function() {
            $('#expired_at').datetimepicker({
                // options here
                format: 'Y-m-d H:i:s',
            });
        });
    </script>

    <script>
        // edit coupen with modal and js code

        $("#order_update_form").submit(function(event) {
            event.preventDefault();
            // alert('sajid');
            $.ajax({
                type: "post",
                url: "<?php echo e(route('order.update', $order->id)); ?>", // Corrected the URL
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response.status === 200) {
                        window.location.href = '<?php echo e(route('order-detail', $order->id)); ?>';


                    } else {
                        $.each(response.errors, function(field, errors) {
                            $('#' + field + '_error').html(errors.join('<br>'));
                        });
                    }

                },

            });
        });
        // send invoice email
        $("#Invoice_Send").submit(function(event) {
            event.preventDefault();
            // alert('sajid');
            $.ajax({
                type: "post",
                url: "<?php echo e(route('sendInvoce_email', $order->id)); ?>", // Corrected the URL
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response.status === 200) {
                        toastr.success(response.message, 'Success!');
                        setTimeout(function() {
                            window.location.href = '<?php echo e(route('order-detail', $order->id)); ?>';

                        }, 5000);
                    }


                },

            });


        });
    </script>
    <?php if($errors->any()): ?>
        <script>
            $(document).ready(function() {
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    toastr.error('<?php echo e($error); ?>', 'Error');
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/admin/pages/order/orderDetails.blade.php ENDPATH**/ ?>