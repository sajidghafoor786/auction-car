 
 
 <?php $__env->startSection('title'); ?>
     Shop
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('bodyContent'); ?>
     <section class="section-5 pt-3 pb-3 mb-3 bg-white">
         <div class="container">
             <div class="light-font">
                 <ol class="breadcrumb primary-color mb-0">
                     <li class="breadcrumb-item"><a class="white-text" href="<?php echo e(route('user.home')); ?>">Home</a></li>
                     <li class="breadcrumb-item active">Shop</li>
                 </ol>
             </div>
         </div>
     </section>

     <section class="section-6 pt-5">
         <div class="container">
             <div class="row">
                 <div class="col-md-3 sidebar">
                     <div class="sub-title">
                         <h2>Categories</h3>
                     </div>
                     
                     <div class="card">
                         <div class="card-body">
                             <div class="accordion accordion-flush" id="accordionExample">
                                 <?php if($Category->isNotEmpty()): ?>
                                     <?php $__currentLoopData = $Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <div class="accordion-item">
                                             <?php if($category->sub_category->isNotEmpty()): ?>
                                                 <h2 class="accordion-header" id="headingOne">
                                                     <button class="accordion-button collapsed " type="button"
                                                         data-bs-toggle="collapse"
                                                         data-bs-target="#collapseOne-<?php echo e($key); ?>"
                                                         aria-expanded="false"
                                                         aria-controls="collapseOne-<?php echo e($key); ?>">
                                                         <?php echo e($category->name); ?>

                                                     </button>
                                                 </h2>
                                             <?php else: ?>
                                                 <a href="<?php echo e(route('user.shop', str_replace(' ', '-', $category->slug))); ?>"
                                                     class="nav-item nav-link <?php echo e($categorySelected == $category->id ? 'text-primary' : ''); ?>">
                                                     <?php echo e($category->name); ?></a>
                                             <?php endif; ?>
                                             <?php if($category->sub_category->isNotEmpty()): ?>
                                                 <div id="collapseOne-<?php echo e($key); ?>"
                                                     class="accordion-collapse collapse <?php echo e($categorySelected == $category->id ? 'show' : ''); ?>"
                                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample"
                                                     style="">
                                                     <?php $__currentLoopData = $category->sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <div class="accordion-body">
                                                             <div class="navbar-nav">
                                                                 <a href="<?php echo e(route('user.shop', [str_replace(' ', '-', $category->slug), str_replace(' ', '-', $sub_category->slug)])); ?>"
                                                                     class="nav-item nav-link <?php echo e($subcategorySelected == $sub_category->id ? 'text-primary' : ''); ?>">
                                                                     <span class="text-danger"> > </span>
                                                                     <?php echo e($sub_category->name); ?></a>

                                                             </div>
                                                         </div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </div>
                                             <?php endif; ?>
                                         </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>

                             </div>
                         </div>
                     </div>
                     
                     <div class="sub-title mt-5">
                         <h2>BRAND</h3>
                     </div>
                     <div class="card">
                         <?php if($Brands->isNotEmpty()): ?>
                             <div class="card-body">
                                 <?php $__currentLoopData = $Brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <div class="form-check mb-2">
                                         <input <?php echo e(in_array($brands->id, $brandArray) ? 'checked' : ''); ?>

                                             class="form-check-input brand-checkbox" type="checkbox"
                                             value="<?php echo e($brands->id); ?>" id="brand-<?php echo e($brands->id); ?>" name="brands[]">
                                         <label class="form-check-label" for="brand-<?php echo e($brands->id); ?>">
                                             <?php echo e($brands->name); ?>

                                         </label>
                                     </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                             </div>
                         <?php endif; ?>
                     </div>
                     <div class="sub-title mt-5">
                         <h2>Price</h3>
                     </div>
                     
                     <div class="card">
                         <div class="card-body">
                             <div class="form-check mb-2">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                 <label class="form-check-label" for="flexCheckDefault">
                                     $0-$100
                                 </label>
                             </div>
                             <div class="form-check mb-2">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     $100-$200
                                 </label>
                             </div>
                             <div class="form-check mb-2">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     $200-$500
                                 </label>
                             </div>
                             <div class="form-check mb-2">
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     $500+
                                 </label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-9">
                     <div class="row pb-3">
                         <div class="col-12 pb-1">
                             <div class="d-flex align-items-center justify-content-end mb-4">
                                 <div class="ml-2">
                                     <div class="btn-group">
                                         <select class="form-select shadow-none" id="sort"
                                             aria-label="Default select example" name="sortName">
                                             
                                             <option value="Latest" <?php echo e($sortingOption == 'Latest' ? 'selected ' : ''); ?>>
                                                 Latest</option>
                                             <option value="Price_High"
                                                 <?php echo e($sortingOption == 'Price_High' ? 'selected ' : ''); ?>>Price_High
                                             </option>
                                             <option value="Price_Low"
                                                 <?php echo e($sortingOption == 'Price_Low' ? 'selected ' : ''); ?>>Price_Low
                                             </option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
                         <?php if($Product->isNotEmpty()): ?>
                             <?php $__currentLoopData = $Product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-md-4">
                                     <div class="card product-card" style="height: 420px; overflow: hidden;">
                                         <div class="product-image position-relative">
                                             <?php
                                                 $product_img = $product->images->first();
                                             ?>
                                             
                                             <div style="height: 300px;">
                                                 <a href="<?php echo e(route('user.product', [str_replace(' ', '-', $product->slug)])); ?>"
                                                     class="product-img"
                                                     style="display: block; height: 100%; width: 100%;">
                                                     <?php if(!empty($product_img)): ?>
                                                         <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"
                                                             alt="user1"
                                                             style="width: 100%; height: 100%; object-fit: cover;">
                                                     <?php endif; ?>
                                                 </a>
                                             </div>
                                             <a class="whishlist" href="javascript:void(0);"
                                                 onclick="WishList(<?php echo e($product->id); ?>);"><i
                                                     class="far fa-heart"></i></a>
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
                         
                         <div class="col-md-12 pt-5">
                             <?php echo e($Product->WithQueryString()->links()); ?>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('custemjs'); ?>
     <script>
         $(document).ready(function() {
             // Attach an event handler to the brand checkboxes
             $('.brand-checkbox').change(function() {
                 // Trigger an AJAX request when a checkbox is changed
                 updateFilteredProducts();
             });
             // Attach an event handler to the sorting dropdown items
             $('#sort').change(function() {
                 // Get the selected sorting option
                 var sortingOption = $(this).val();

                 // Trigger an AJAX request or update the URL based on the selected sorting option
                 updateSorting(sortingOption);
             });
             // Function to update sorting based on the selected option
             function updateSorting(sortingOption) {

                 // Get the current URL
                 var currentUrl = '<?php echo e(url()->current()); ?>';

                 // Get selected brand IDs (you can add this part based on your needs)
                 var selectedBrands = $('.brand-checkbox:checked').map(function() {
                     return $(this).val();
                 }).get();

                 // Construct the URL with selected brand IDs and sorting option
                 var encodedBrands = encodeURIComponent(selectedBrands.join(','));
                 encodedBrands = encodedBrands.replace(/%2C/g, '');

                 currentUrl = currentUrl.replace(/&amp;/g, '&');

                 var url = currentUrl + '?brands=' + encodedBrands + '&sortName=' + encodeURIComponent(
                 sortingOption);
                 //   console.log(url);
                 // Redirect to the updated URL
                 window.location.href = url;
             }
             // Function to update filtered products based on selected brands
             function updateFilteredProducts() {
                 // Get selected brand IDs
                 var selectedBrands = $('.brand-checkbox:checked').map(function() {
                     return $(this).val();
                 }).get();
                 //  alert('id=' +brandArray);

                 // Construct the URL with selected brand IDs
                 var currentUrl = '<?php echo e(url()->current()); ?>';
                 var encodedBrands = encodeURIComponent(selectedBrands.join(','));
                 // Remove %2C (URL-encoded comma) from the brands parameter
                 encodedBrands = encodedBrands.replace(/%2C/g, ',');
                 // Replace occurrences of "&amp;" with "&" in the URL
                 currentUrl = currentUrl.replace(/&amp;/g, '&');

                 var url = currentUrl + '?brands=' + encodedBrands;

                 // Log the URL to the console
                 // console.log(url);

                 // Redirect to the updated URL
                 window.location.href = url;
             }
         });
     </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('../user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main\e-shop\resources\views/user/pages/shop.blade.php ENDPATH**/ ?>