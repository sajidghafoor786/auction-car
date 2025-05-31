<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="row">
               
<div class="col-sm-4 col-md-4 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-info">
                    <p class="card-text">Total Packages (Umrah)</p>
                    <div class="d-flex align-items-end mb-2">
                        <h4 class="card-title mb-0 me-2"><?php echo e($totalPackageUmrahCount ?? 0); ?></h4>
                    </div>
                </div>
                <div class="card-icon">
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-category bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-4 col-md-4 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-info">
                    <p class="card-text">Total Packages (Hajj)</p>
                    <div class="d-flex align-items-end mb-2">
                        <h4 class="card-title mb-0 me-2"><?php echo e($totalPackageHajjCount ?? 0); ?></h4>
                    </div>
                </div>
                <div class="card-icon">
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-category bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>



<script>

    $(document).ready(function() {
        getstats();
    });

    function getstats() {
        $.ajax({
            method: "GET",
            url: "",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 1) {
                    $("#append").html(response.html);
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>