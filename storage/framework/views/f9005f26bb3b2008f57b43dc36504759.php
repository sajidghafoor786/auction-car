 
 
 <?php $__env->startSection('title'); ?>
     E-SHOP
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('bodyContent'); ?>
     <section class="section-5 pt-3 pb-3 mb-3 bg-white">
         <div class="container">
             <div class="light-font">
                 <ol class="breadcrumb primary-color mb-0">
                     <li class="breadcrumb-item"><a class="white-text" href="<?php echo e(route('user.home')); ?>">Home</a></li>
                     <li class="breadcrumb-item"><a class="white-text" href="<?php echo e(route('user.shop')); ?>">Shop</a></li>
                     <li class="breadcrumb-item"><?php echo e($product->title); ?></li>
                 </ol>
             </div>
         </div>
     </section>

     <section class="section-7 pt-3 mb-3">
         <div class="container">
             <div class="row ">
                 <div class="col-md-5">
                     
                     <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                         <div class="carousel-inner bg-light">

                             <?php if(!empty($product->images)): ?>
                                 <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <div class="carousel-item <?php echo e($key == '0' ? 'active' : ''); ?>" style="height: 500px;">
                                         <img src="<?php echo e(asset('upload/products_img/' . $productImage->image)); ?>"
                                             alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                                     </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>

                         </div>
                         <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                             <i class="fa fa-2x fa-angle-left text-dark"></i>
                         </a>
                         <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                             <i class="fa fa-2x fa-angle-right text-dark"></i>
                         </a>
                     </div>
                 </div>
                 
                 <div class="col-md-7">
                     <div class="bg-light right">
                         <h1><?php echo e($product->title); ?></h1>
                         <div class="d-flex mb-3">
                             <div class="text-primary mr-2">
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star"></small>
                                 <small class="fas fa-star-half-alt"></small>
                                 <small class="far fa-star"></small>
                             </div>
                             <small class="pt-1">(99 Reviews)</small>
                         </div>
                         <?php if($product->compare_price > 0): ?>
                             <h2 class="price text-secondary"><del><?php echo e($product->compare_price); ?>/PKR</del></h2>
                         <?php endif; ?>
                         <h2 class="price "><?php echo e($product->price); ?>/PKR</h2>

                         <p><?php echo e($product->description); ?></p>
                         <?php if($product->qty > 0): ?>
                             <a href="javascript:void(0);" onclick="addToCart(<?php echo e($product->id); ?>);" class="btn btn-dark"><i
                                     class="fas fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                         <?php else: ?>
                             <a href="javascript:void(0);" class="btn btn-dark"><i class="fas fa-shopping-cart"></i>
                                 &nbsp;Out OF Stock</a>
                         <?php endif; ?>
                     </div>
                 </div>
                 
                 <div class="col-md-12 mt-5">
                     <div class="bg-light">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                     data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                     aria-selected="true">Description</button>
                             </li>
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping"
                                     type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping &
                                     Returns</button>
                             </li>
                             <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                     type="button" role="tab" aria-controls="reviews"
                                     aria-selected="false">Reviews</button>
                             </li>
                         </ul>
                         <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="description" role="tabpanel"
                                 aria-labelledby="description-tab">
                                 <?php if(!empty($product->short_desc)): ?>
                                     <p><?php echo e($product->short_desc); ?> </p>
                                 <?php else: ?>
                                     <p>Not Short Description about this product...</p>
                                 <?php endif; ?>
                             </div>
                             <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                 <?php if(!empty($product->shipping_returns)): ?>
                                     <p><?php echo e($product->shipping_returns); ?> </p>
                                 <?php else: ?>
                                     <p>Not shipping_returns about this product...</p>
                                 <?php endif; ?>
                             </div>
                             <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     
     <section class="pt-5 section-8">
         <div class="container">
             <div class="section-title">
                 <h2>Latest Products</h2>
             </div>
             <div class="col-md-12">
                 <div id="related-products" class="carousel">
                     <?php if($productLatest->isNotEmpty()): ?>
                         <?php $__currentLoopData = $productLatest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="card product-card">
                                 <div class="product-image position-relative">
                                     <?php
                                         $product_img = $product->images->first();
                                     ?>
                                     <a href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>">
                                         <div class="" style="height: 300px;">
                                             <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                 alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                                         </div>
                                     </a>
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
                                     <a class="h6 link" href=""><?php echo e($product->title); ?></a>
                                     <div class="price mt-2">
                                         <?php if($product->compare_price > 0): ?>
                                             <span
                                                 class="h6 text-unde rline"><del><?php echo e($product->compare_price); ?></del></span>
                                         <?php endif; ?>
                                         <span class="h5"><strong><?php echo e($product->price); ?></strong></span>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>

                 </div>
             </div>
         </div>
     </section>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/user/pages/product.blade.php ENDPATH**/ ?>