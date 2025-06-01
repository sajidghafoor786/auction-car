<?php $__env->startSection('title'); ?>
    E-SHOP
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-gavel text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Verified Auctions</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-car text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Wide Car Range</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-clock text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Real-Time Bidding</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-headset text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Customer Support</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
  .product-card {
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
}
.iamge-hover img{
    padding: 15px;
    transition: padding 0.4s ease;
}
.iamge-hover:hover img{
padding: 0px ;

}
.auction span {
    font-size: 11px;
    font-family: monospace;
}

.auction i {
    font-size: 11px;
}
.card-body{
padding-bottom: 0px !important;
}
a:hover{
    cursor: pointer;
}


</style>
<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title mb-4">
            <h2 class="text-dark">Car Auctions</h2>
        </div>
        <div class="row pb-3">
            <?php if($activeAuctions->isNotEmpty()): ?>
                <?php $__currentLoopData = $activeAuctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-4">
                        <div class="card product-card border-0 shadow rounded-3 h-100">
                            <div class="position-relative iamge-hover" style="height: 250px; overflow: hidden;">
                                <?php $image = $auction->car->image ?? null; ?>
                                <img src="<?php echo e($image ? asset('storage/' . $image) : asset('images/default-car.jpg')); ?>"
                                     alt="Car Image"
                                     class="w-100 h-100"
                                     style="object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <!-- <div class="mb-2 text-secondary">
                                    <i class="fas fa-calendar-alt me-1 text-primary"></i>
                                    <strong class="text-dark">Start:</strong>
                                    <?php echo e(\Carbon\Carbon::parse($auction->start_date)->format('d M Y h:i A')); ?>

                                </div> -->
                                <a href="link h6 text-dark"><?php echo e($auction->car->name); ?></a>
                                <div class="d-flex auction">
                                    <div class="mb-2">
                                        <i class="fas fa-gavel me-1 text-success"></i>
                                        <span class="text-dark">Min Bid</span>
                                        <span class="text-success"><?php echo e(number_format($auction->minimum_bid)); ?> /PKR</span>
                                    </div>
                                    <div class="mb-2 justify-content-start">
                                        <i class="fas fa-hand-holding-usd me-1 text-danger"></i>
                                        <span class="text-dark">Current</span>
                                        <span class="text-danger"><?php echo e(number_format($auction->current_bid)); ?>  /PKR</span>
                                    </div>

                                </div>
                                <a href="<?php echo e(route('auctionDetail', $auction->id)); ?>" class="btn btn-primary btn mt-2" >
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">No active car auctions available.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\auction-car\resources\views/frontend/index.blade.php ENDPATH**/ ?>