 <section class="section-2">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                 </div>
             </div>
             <div class="col-lg-3 ">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                 </div>
             </div>
             <div class="col-lg-3">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                 </div>
             </div>
             <div class="col-lg-3 ">
                 <div class="box shadow-lg">
                     <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                     <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                 </div>
             </div>
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
<?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/user/include/body.blade.php ENDPATH**/ ?>