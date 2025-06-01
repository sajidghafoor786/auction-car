

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Cars /</span> List
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="<?php echo e(route('admin.cars.create')); ?>" class="btn btn-primary float-end">Add Car</a>
        </div>
    </div>
    <div class="card p-3">
        <div class="table-responsive text-nowrap">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cars_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($car->id); ?></td>
                        <td><?php echo e($car->name); ?></td>
                        <td><?php echo e($car->make); ?></td>
                        <td><?php echo e($car->model); ?></td>
                        <td><?php echo e($car->year); ?></td>
                        <td class="text-center">
                            <?php if($car->status == 1): ?>
                                <a href="javascript:void(0);" onclick="changeStatus(0, <?php echo e($car->id); ?>);" class="badge bg-success">Active</a>
                            <?php else: ?>
                                <a href="javascript:void(0);" onclick="changeStatus(1, <?php echo e($car->id); ?>);" class="badge bg-danger">Inactive</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="dropdown-item" href="<?php echo e(route('admin.cars.edit', $car->id)); ?>">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a>

                            <a class="dropdown-item" href="<?php echo e(route('admin.cars.show', $car->id)); ?>">
                                <i class="bx bx-show me-1"></i> View</a>

                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteCar(<?php echo e($car->id); ?>);">
                                <i class="bx bx-trash me-1"></i> Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#cars_table').DataTable({
            responsive: true,
            "order": [[0, 'desc']],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            }]
        });
    });

    function deleteCar(carId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this car?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                   url: "<?php echo e(url('admin/cars')); ?>/" + carId,
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 1500);
                    }
                });
            }
        });
    }

    function changeStatus(status, carId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change car status?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo e(route('admin.cars.changeStatus')); ?>",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        status: status,
                        car_id: carId
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 1500);
                    }
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/cars/index.blade.php ENDPATH**/ ?>