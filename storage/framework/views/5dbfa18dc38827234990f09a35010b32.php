
<?php $__env->startSection('title'); ?>
    E-SHOP Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    OrderList
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    
    <div>
        <div class="container-fluid py-4 px-4 ">
            <div class="d-sm-flex justify-content-between">
                <!-- <div>
                    <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#addCoupen">
                        <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                        Order
                    </button>
                </div> -->
                <div class="d-flex">
                    <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
                        <i class="material-icons text-xs position-relative">archive</i>
                        Export CSV
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Order Table</h5>
                            <p class="text-sm mb-0">
                                View all the Order.
                            </p>
                        </div>
                        <div class="table-responsive">
                            <?php if($order->isNotEmpty()): ?>
                                <table class="table table-flush align-items-center" id="datatable-search">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>OrderId</th>
                                            <th>Custemer</th>
                                            <th>Email</th>
                                            <th>Phone_Number</th>
                                            <th>Status</th>
                                            <th>Payment_Status</th>
                                            <th>Total</th>
                                            <th>Purchas Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-xs">
                                                        <a
                                                            href="<?php echo e(route('order-detail', $item->id)); ?>">OR#<?php echo e($item->id); ?></a>

                                                    </span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../../../assets/img/team-2.jpg"
                                                            class="avatar avatar-xs me-2" alt="user image">
                                                        <span><?php echo e($item->Users->name); ?></span>
                                                    </div>
                                                </td>
                                                <td class="font-weight-normal">
                                                    <span class="my-2 text-xs"><?php echo e($item->Users->email); ?></span>
                                                </td>

                                                <td class="text-xs font-weight-normal">
                                                    <span class="my-2 text-xs"><?php echo e($item->phone_no); ?></span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <?php if($item->order_status == 'delivered'): ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-success fontSize">delivered</span>
                                                    <?php elseif($item->order_status == 'shipping'): ?>
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning fontSize">shipping</span>
                                                    <?php elseif($item->order_status == 'cancelled'): ?>
                                                        <span class="badge badge-sm bg-gradient-danger fontSize">
                                                            Cancelled
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge badge-sm bg-gradient-info  fontSize">
                                                            Pending
                                                        </span>
                                                    <?php endif; ?>

                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <div class="d-flex align-items-center">
                                                        <?php if($item->payment_status == 'paid'): ?>
                                                            <button
                                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i
                                                                    class="material-icons text-sm"
                                                                    aria-hidden="true">done</i></button>
                                                            <span>Paid</span>
                                                        <?php else: ?>
                                                            <button
                                                                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i
                                                                    class="material-icons text-sm"
                                                                    aria-hidden="true">clear</i></button>
                                                            <span>un-paid</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <span
                                                        class="my-2 text-xs"><?php echo e(number_format($item->grand_total, 2)); ?>/PKR</span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <span class="my-2 text-xs">
                                                        <?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d F, Y')); ?></span>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="text-center p-5 ">
                                    <span class="text-secondary text-ls font-weight-bold">Record Not Found</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

       

        <!--end  Modal for add product -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('jsCode'); ?>
        
        <script>
            $(document).ready(function() {
                $('#started_at').datetimepicker({
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

       
        <?php if($errors->any()): ?>
            <script>
                $(document).ready(function() {
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        toastr.error('<?php echo e($error); ?>', 'Error');
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                });
            </script>
        <?php endif; ?>
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: false
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "material-" + type,
                    };

                    if (type === "csv") {
                        data.columnDelimiter = "|";
                    }

                    dataTableSearch.export(data);
                });
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/admin/pages/order/orderList.blade.php ENDPATH**/ ?>