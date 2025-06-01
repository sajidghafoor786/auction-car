

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> List
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="<?php echo e(route('admin.carAuction.create')); ?>" class="btn btn-primary float-end">Add Car Auction</a>
        </div>
    </div>
    <div class="card p-3">
        <div class="table-responsive text-nowrap">
            <table width="100%" class="table table-striped table-bordered table-hover" id="carAuction_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car</th>
                        <th>Minimum Bid</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $carAuctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($auction->id); ?></td>
                        <td><?php echo e($auction->car->name ?? 'N/A'); ?></td>
                        <td><?php echo e($auction->minimum_bid); ?> / PKR</td>
                        <td><?php echo e(\Carbon\Carbon::parse($auction->start_date)->format('d M Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($auction->end_date)->format('d M Y')); ?></td>
                        <td class="text-center">
                            <?php if($auction->status == 'active'): ?>
                                <a href="javascript:void(0);" onclick="changeStatus('closed', <?php echo e($auction->id); ?>);" class="badge bg-success">Active</a>
                            <?php else: ?>
                                <a href="javascript:void(0);" onclick="changeStatus('active', <?php echo e($auction->id); ?>);" class="badge bg-danger">Closed</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="dropdown-item" href="<?php echo e(route('admin.carAuction.edit', $auction->id)); ?>">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a>

                            <a class="dropdown-item" href="<?php echo e(route('admin.carAuction.show', $auction->id)); ?>">
                                <i class="bx bx-show me-1"></i> View</a>

                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteAuction(<?php echo e($auction->id); ?>);">
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
        $('#carAuction_table').DataTable({
            responsive: true,
            "order": [[0, 'desc']],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            }]
        });
    });

    function deleteAuction(auctionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this auction?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo e(url('admin/car-auctions')); ?>/" + auctionId + '/delete',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 3000);
                    }
                });
            }
        });
    }

    function changeStatus(status, auctionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change auction status?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo e(route('admin.carAuction.changeStatus')); ?>",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        status: status,
                        auction_id: auctionId
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 3000);
                    }
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/car-auction/index.blade.php ENDPATH**/ ?>