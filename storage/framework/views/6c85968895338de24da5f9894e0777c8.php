  <div class="bg-light top-header">
      <div class="container">
          <div class="row align-items-center d-none d-lg-flex justify-content-between">
              <div class="col-lg-4 logo">
                  <a href="<?php echo e(route('user.home')); ?>" class="text-decoration-none"
                      >
                      <img src="<?php echo e(asset('admin-2/assets-2/logo/logo-2.png')); ?>" style="height: 100px; width: 150px;object-fit: cover; ">
                  </a>
              </div>

              <div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
                  <?php if(Auth::check()): ?>
                      <a href="<?php echo e(route('user.profile')); ?>" class="nav-link text-dark">My Account</a>
                  <?php else: ?>
                      <a href="<?php echo e(route('user.login')); ?>" class="nav-link text-dark">Login/Register</a>
                  <?php endif; ?>
                  <form action="<?php echo e(route('user.shop')); ?>" method="GET">
                      <div class="input-group">
                          <input type="text" placeholder="Search For Products" value="<?php echo e(Request::get('Search')); ?>"
                              class="form-control" name="Search">
                          <button type="submit" class="input-group-text ">
                              <i class="fa fa-search"></i>
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <header class="bg-dark">
      <div class="container">
          <nav class="navbar navbar-expand-xl" id="navbar">
              <a href="<?php echo e(route('user.home')); ?>" class="text-decoration-none mobile-logo">
                  <span class="h2 text-uppercase text-primary bg-dark">Online</span>
                  <span class="h2 text-uppercase text-white px-2">SHOP</span>
              </a>
              <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon icon-menu"></span>
                  <i class="navbar-toggler-icon fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      
                      <?php if(getCategort()->isNotEmpty()): ?>
                          <?php $__currentLoopData = getCategort(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="nav-item dropdown">
                                  <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                      aria-expanded="false">
                                      <?php echo e($category->name); ?>

                                  </button>
                                  <?php if($category->sub_category->isNotEmpty()): ?>
                                      <ul class="dropdown-menu dropdown-menu-dark">
                                          <?php $__currentLoopData = $category->sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <li><a class="dropdown-item nav-link"
                                                      href="<?php echo e(route('user.shop', [str_replace(' ', '-', $category->slug), str_replace(' ', '-', $sub_category->slug)])); ?>"><?php echo e($sub_category->name); ?></a>
                                              </li>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </ul>
                                  <?php endif; ?>
                              </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                          </li>
                      <?php endif; ?>
                  </ul>
              </div>
              <?php
                  $cartCount = Cart::count();
              ?>
              <div class="right-nav py-0">
                  <a href="<?php echo e(route('user.cart')); ?>" class="ml-3 d-flex pt-2">
                      <i class="fas fa-shopping-cart text-primary fs-3"> <span
                              class="position-absolute top-0 start-100 translate-middle badge border border-light CartIcon  bg-danger"><?php echo e($cartCount); ?><span
                                  class="visually-hidden">unread messages</span></i>
                  </a>
              </div>
              <!-- <div class="wish">
                  <a href="<?php echo e(route('user.cart')); ?>" class="d-flex pt-2">
                       <i class="fas fa-heart  text-primary fs-3"><span
                              class="position-absolute top-0 start-100 translate-middle badge border border-light CartIcon  bg-danger"><span
                                  class="visually-hidden">unread messages</span></i>
                  </a>
              </div> -->
          </nav>
      </div>
  </header>

<?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/user/include/header.blade.php ENDPATH**/ ?>