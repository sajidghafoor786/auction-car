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
<section class="section-3">
    <div class="container">
        <div class="section-title">
            <h2>Auction Categories</h2>
        </div>
        <div class="row pb-3">
            <div class="col-lg-3">
                <div class="cat-card">
                    <div class="left">
                        <img src="https://source.unsplash.com/400x300/?suv,car" alt="SUV" class="img-fluid">
                    </div>
                    <div class="right">
                        <div class="cat-data">
                            <h2>SUVs</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cat-card">
                    <div class="left">
                        <img src="https://source.unsplash.com/400x300/?sedan,car" alt="Sedan" class="img-fluid">
                    </div>
                    <div class="right">
                        <div class="cat-data">
                            <h2>Sedans</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cat-card">
                    <div class="left">
                        <img src="https://source.unsplash.com/400x300/?truck,car" alt="Truck" class="img-fluid">
                    </div>
                    <div class="right">
                        <div class="cat-data">
                            <h2>Trucks</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cat-card">
                    <div class="left">
                        <img src="https://source.unsplash.com/400x300/?luxury,car" alt="Luxury" class="img-fluid">
                    </div>
                    <div class="right">
                        <div class="cat-data">
                            <h2>Luxury Cars</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Featured Auction Cars</h2>
        </div>
        <div class="row pb-3">
            <?php for($i = 1; $i <= 4; $i++): ?>
                <div class="col-md-3">
                    <div class="card product-card" style="height: 420px; overflow: hidden;">
                        <div class="product-image position-relative" style="height: 250px;">
                            <a href="#" class="product-img" style="display: block; height: 100%; width: 100%;">
                                <img src="https://source.unsplash.com/400x300/?car,auction,<?php echo e($i); ?>" alt="Auction Car <?php echo e($i); ?>"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="badge bg-success position-absolute top-0 start-0 m-2">LIVE</div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Car Model <?php echo e($i); ?></h5>
                            <p class="text-muted mb-1">Starts at: <strong>₨ <?php echo e(100000 * $i); ?></strong></p>
                            <p class="text-danger">Current Bid: <strong>₨ <?php echo e(100000 * $i + 20000); ?></strong></p>
                            <a href="#" class="btn btn-primary mt-2">Bid Now</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Latest Auction Listings</h2>
        </div>
        <div class="row pb-3">
            <?php for($i = 5; $i <= 8; $i++): ?>
                <div class="col-md-3">
                    <div class="card product-card" style="height: 420px; overflow: hidden;">
                        <div class="product-image position-relative" style="height: 250px;">
                            <a href="#" class="product-img" style="display: block; height: 100%; width: 100%;">
                                <img src="https://source.unsplash.com/400x300/?car,vehicle,<?php echo e($i); ?>" alt="Auction Car <?php echo e($i); ?>"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="badge bg-info position-absolute top-0 start-0 m-2">NEW</div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Car Model <?php echo e($i); ?></h5>
                            <p class="text-muted mb-1">Starts at: <strong>₨ <?php echo e(150000 * $i); ?></strong></p>
                            <p class="text-danger">Current Bid: <strong>₨ <?php echo e(150000 * $i + 30000); ?></strong></p>
                            <a href="#" class="btn btn-outline-primary mt-2">Place Your Bid</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

 <section class="section-3">
     <div class="container">
         <div class="section-title">
             <h2>Categories</h2>
         </div>
         <div class="row pb-3">
             <?php if(getCategortAll()->isNotEmpty()): ?>
                 <?php $__currentLoopData = getCategortAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-lg-3">
                         <div class="cat-card">
                             <?php if($category->image !== ''): ?>
                                 <div class="left">
                                     <img src="<?php echo e('upload/category_img/' . $category->image); ?>" alt=""
                                         class="img-fluid">
                                 </div>
                             <?php endif; ?>
                             <div class="right">
                                 <div class="cat-data">
                                     <h2><?php echo e($category->name); ?></h2>
                                     
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
         </div>
     </div>
 </section>

 <section class="section-4 pt-5">
     <div class="container">
         <div class="section-title">
             <h2>Featured Products</h2>
         </div>
         <div class="row pb-3">
             <?php if(getProduct()->isNotEmpty()): ?>
                 <?php $__currentLoopData = getProduct(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-md-3">
                         <div class="card product-card" style="height: 420px; overflow: hidden;">
                             <div class="product-image position-relative">
                                 <?php
                                     $product_img = $product->images->first();
                                 ?>
                                 
                                 <div style="height: 300px;">
                                     <a href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>"
                                         class="product-img" style="display: block; height: 100%; width: 100%;">
                                         <?php if(!empty($product_img)): ?>
                                             <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                 alt="user1" style="width: 100%; height: 100%; object-fit: cover;">
                                         <?php endif; ?>
                                     </a>
                                 </div>
                                 <a class="whishlist" href="javascript:void(0);"
                                     onclick="WishList(<?php echo e($product->id); ?>);"><i class="far fa-heart"></i></a>
                                 <?php if($product->qty > 0): ?>
                                     <div class="product-action">
                                         <a class="btn btn-dark"href="javascript:void(0);"
                                             onclick="addToCart(<?php echo e($product->id); ?>);"> <i
                                                 class="fa fa-shopping-cart"></i> Add
                                             To Cart </a>
                                     </div>
                                 <?php else: ?>
                                     <div class="product-action">
                                         <a class="btn btn-dark"href="javascript:void(0);"> <i
                                                 class="fa fa-shopping-cart"></i> Out Of Stock </a>
                                     </div>
                                 <?php endif; ?>
                             </div>
                             <div class="card-body text-center mt-3">
                                 <a class="h6 link" href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>"><?php echo e($product->title); ?></a>
                                 <div class="price mt-2">
                                     <span class="h5"><strong><?php echo e($product->price); ?>/PKR</strong></span>
                                     <?php if($product->compare_price > 0): ?>
                                         <span class="h6 text-underline"><del><?php echo e($product->compare_price); ?></del></span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
         </div>
     </div>
 </section>

 <section class="section-4 pt-5">
     <div class="container">
         <div class="section-title">
             <h2>Latest Produsts</h2>
         </div>
         <div class="row pb-3">
             <?php if(getProductLatest()->isNotEmpty()): ?>
                 <?php $__currentLoopData = getProductLatest(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-md-3">
                         <div class="card product-card" style="height: 420px; overflow: hidden;">
                             <div class="product-image position-relative">
                                 <?php
                                     $product_img = $product->images->first();
                                 ?>
                                 
                                 <div style="height: 300px;">
                                     <a  href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>" class="product-img"
                                         style="display: block; height: 100%; width: 100%;">
                                         <?php if(!empty($product_img)): ?>
                                             <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                 alt="user1" style="width: 100%; height: 100%; object-fit: cover;">
                                         <?php endif; ?>
                                     </a>
                                 </div>
                                 <a class="whishlist" href="javascript:void(0);"
                                     onclick="WishList(<?php echo e($product->id); ?>);"><i class="far fa-heart"></i></a>
                                 <?php if($product->qty > 0): ?>
                                     <div class="product-action">
                                         <a class="btn btn-dark"href="javascript:void(0);"
                                             onclick="addToCart(<?php echo e($product->id); ?>);"> <i
                                                 class="fa fa-shopping-cart"></i> Add
                                             To Cart </a>
                                     </div>
                                 <?php else: ?>
                                     <div class="product-action">
                                         <a class="btn btn-dark"href="javascript:void(0);"> <i
                                                 class="fa fa-shopping-cart"></i> Out Of Stock </a>
                                     </div>
                                 <?php endif; ?>
                             </div>
                             <div class="card-body text-center mt-3">
                                 <a class="h6 link" href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>"><?php echo e($product->title); ?></a>
                                 <div class="price mt-2">
                                     <span class="h5"><strong><?php echo e($product->price); ?>/PKR</strong></span>
                                     <?php if($product->compare_price > 0): ?>
                                         <span
                                             class="h6 text-underline"><del><?php echo e($product->compare_price); ?></del></span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
         </div>
     </div>
 </section>
<?php /**PATH E:\laragon\www\SmartShop\resources\views/user/include/body.blade.php ENDPATH**/ ?>