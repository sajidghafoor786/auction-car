
<?php $__env->startSection('title'); ?>
    E-SHOP Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageName'); ?>
    Shipping_Charge
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <!-- Modal for update shippingEdit -->
    <div class="modal fade" id="shippingEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel"> Update shipping Charges </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('shipping.update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="editId" name="editId">
                        <div class="form-row">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Country</label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option selected>Select a category</option>
                                    <?php if($country->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" class="m-3"><?php echo e($item->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label class="ms-0">Amount</label>
                                    <input type="number" class="form-control" value="" id="amount" name="amount"
                                        required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-2 mb-3">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--end  Modal for update shippingEdit -->
    <div>
        <div class="container-fluid py-4 px-4 ">
            <div class="d-sm-flex justify-content-between">
                <div>
                    <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#shippingAdd">
                        <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                         Shipping_Charge
                    </button>
                </div>
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
                            <h5 class="mb-0">Shipping_Charge Table</h5>
                            <p class="text-sm mb-0">
                                View all the Shipping_Charge.
                            </p>
                        </div>
                        <div class="table-responsive p-0">
                            <?php if($shipping->isNotEmpty()): ?>
                                <table class="table align-items-center mb-0 table-striped"  id="datatable-search">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                id</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Country_Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Amount</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?php echo e($item->id); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?php echo e($item->country->name); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?php echo e($item->amount); ?></span>
                                                </td>
                                                <td class="td-actions text-right">
                                                    
                                                    <button type="button"
                                                        class="btn btn-success btn-icon-only shippingEdit"
                                                        value="<?php echo e($item->id); ?>"><span
                                                            class="btn-inner--icon text-center"><i
                                                                class="material-icons">edit</i></span>
                                                    </button>
                                                    
                                                    <a href="<?php echo e(route('shipping.destroy', $item->id)); ?> "
                                                        class="btn btn-danger btn-icon-only ">
                                                        <span class="btn-inner--icon text-center"><i
                                                                class="material-icons">delete</i></span>
                                                    </a>
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


        <!-- Modal for Add  shipping  -->
        <div class="modal fade" id="shippingAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ms-auto" id="exampleModalLabel">Shipping Details Here</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('shipping.create')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Country</label>
                                    <select class="form-control" name="country_id" id="country_id" required>
                                        <option selected>Select a category</option>
                                        <?php if($country->isNotEmpty()): ?>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" class="m-3"><?php echo e($item->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="ms-0">Amount</label>
                                        <input type="number" class="form-control" name="amount" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-2 mb-3">Save</button>
                                </div>
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
                $(document).on('click', '.shippingEdit', function() {
                    var editId = $(this).val();
                    // alert("Student ID: " + editId);
                    $('#shippingEdit').modal('show');
                    $.ajax({
                        type: "post",
                        url: "/shipping/edit/" + editId,
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status === 200 && response.shippings) {
                                $('#editId').val(editId);
                                $('#country_id').val(response.shippings.country_id);
                                $('#amount').val(response.shippings.amount);

                                // Update the status dropdown in the edit modal
                                $('#editStatus').html('<option value="1" ' + (response.brands
                                        .status == 1 ? 'selected' : '') + '>Active</option>' +
                                    '<option value="0" ' + (response.brands.status == 0 ?
                                        'selected' : '') + '>In-Active</option>');


                            } else {
                                console.log("No images found in the response.");
                            }
                            // Click event handler for the delete button
                            $(document).on('click', '.deleteImageBtn', function() {
                                var editId = $('#editId').val();
                                var imageNameToDelete = $(this).data('image');

                                // Remove the corresponding card on delete button click
                                $(this).closest('.card').remove();

                                // Delete the image via AJAX
                                $.ajax({
                                    type: "DELETE",
                                    url: "/brands/deleteimage/" + editId,
                                    data: {
                                        imageName: imageNameToDelete
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    },
                                    success: function(response) {
                                        // Handle success response if needed
                                        // console.log(response);
                                    },

                                });
                            });
                        }

                    });
                });
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/admin/pages/shipping.blade.php ENDPATH**/ ?>