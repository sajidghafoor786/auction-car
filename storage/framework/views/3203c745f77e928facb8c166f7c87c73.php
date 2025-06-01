<?php $__env->startSection('title'); ?>
E-SHOP
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Auction Car</a></li>
                <li class="breadcrumb-item"><?php echo e($auction->car->name); ?></li>
            </ol>
        </div>
    </div>
</section>
<style>
    .image-zoom-wrapper {
        overflow: hidden;
    }

    .image-zoom {
        transition: transform 0.5s ease;
    }

    .image-zoom-wrapper:hover .image-zoom {
        transform: scale(1.1);
    }

    .price {
        font-family: monospace;
    }

    table th,
    table td {
        vertical-align: middle;
    }
</style>
<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row">
            <!-- Car Image Section -->
            <div class="col-md-5">
                <div class="bg-light">
                    <div class="carousel-item active image-zoom-wrapper" style="height: 500px; overflow: hidden;">
                        <img src="<?php echo e(asset('storage/' . $auction->car->image)); ?>"
                            alt="Image"
                            class="image-zoom"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Car Detail Section -->
            <div class="col-md-7">
                <div class="bg-light right p-3">
                    <h1><?php echo e($auction->car->name); ?></h1>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-warning">Current Bid:</span>
                            <h5><?php echo e($auction->current_bid); ?> PKR</h5>

                            <span class="text-warning">Minimum Bid:</span>
                            <h5><?php echo e($auction->minimum_bid); ?> PKR</h5>

                            <span class="text-warning">Start Date:</span>
                            <h5><?php echo e($auction->start_date ?? 'N/A'); ?></h5>

                            <span class="text-warning">End Date:</span>
                            <h5><?php echo e($auction->end_date ?? 'N/A'); ?></h5>
                        </div>
                        <div class="col-md-6">
                            <span class="text-warning">Car Make:</span>
                            <h5><?php echo e($auction->car->make ?? 'Toyota'); ?></h5>
                            <span class="text-warning">Car Model:</span>
                            <h5><?php echo e($auction->car->model ?? 'N/A'); ?></h5>
                            <span class="text-warning">Car Year:</span>
                            <h5><?php echo e($auction->car->year ?? 'N/A'); ?></h5>
                        </div>
                    </div>
                    <span class="text-warning">Description:</span>
                    <p><?php echo e($auction->car->description); ?></p>


                    <form id="bidForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="auction_id" value="<?php echo e($auction->id); ?>">
                        <div class="row align-item-center">
                            <div class="col-md-4">
                                <label class="form-label">Current Maximum Bid</label>
                                <input type="text" class="form-control" disabled value="<?php echo e($auction->current_bid); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Your Bid</label>
                                <input type="number" name="bid_amount" class="form-control" placeholder="Enter your bid amount">
                            </div>
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-primary w-100" style="margin-top: 32px;">
                                    <i class="fas fa-gavel me-1"></i> Bid Now
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="bidMessage" class="mt-3"></div>

                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="bg-white p-3">
                    <h2>Bid History</h2>

                    <?php if($bids->isEmpty()): ?>
                    <p class="text-muted">No bids yet. Be the first to bid!</p>
                    <?php else: ?>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Bidder</th>
                                <th>Bid Amount (PKR)</th>
                                <th>Bid Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($bid->user->name ?? 'Unknown User'); ?></td>
                                <td><?php echo e(number_format($bid->bid_amount)); ?></td>
                                <td><?php echo e($bid->created_at->format('d M Y, h:i A')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</section>


<section class="pt-5 section-8">
    <div class="container">
        <div class="section-title">
            <h2>Latest Auction Car</h2>
        </div>
        <div class="col-md-12">
            <div id="related-products" class="carousel">
                <div class="card product-card">
                    <div class="product-image position-relative">
                        <a href="#">
                            <div style="height: 300px;">
                                <img src="<?php echo e(asset('upload/products_img/sample.jpg')); ?>"
                                    alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </a>
                        <a class="whishlist" href="javascript:void(0);"><i class="far fa-heart"></i></a>
                        <div class="product-action">
                            <a class="btn btn-dark" href="javascript:void(0);">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center mt-3">
                        <a class="h6 link" href="#">Sample Product</a>
                        <div class="price mt-2">
                            <span class="h6 text-underline"><del>5999</del></span>
                            <span class="h5"><strong>4999</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custemjs'); ?>
<script>
    $('#bidForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('add-bid')); ?>",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                toastr.success(response.message);
                $('#bidMessage').addClass('d-none');

            },
            error: function(xhr) {
                const res = xhr.responseJSON;
                if (res && res.message) {
                   $('#bidMessage').removeClass('d-none');
                    $('#bidMessage').html(`<div class="alert alert-danger">${res.message}</div>`);
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/frontend/auction-detail.blade.php ENDPATH**/ ?>