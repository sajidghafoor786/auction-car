


<header class="py-3" style="background: linear-gradient(to right, #FFD700, #000000); padding: 10px 0;">
    <div class="container">
        <nav class="navbar navbar-expand-xl" id="navbar">
            <div class="col-lg-4 logo">
                <a href="<?php echo e(route('user.home')); ?>" class="text-decoration-none text-white fw-bold fs-5">
                    <i class="fa fa-car me-2"></i> Auction Car
                </a>
            </div>
            <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-menu"></span>
                <i class="navbar-toggler-icon fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">About us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Help</a>
                    </li>
                </ul>
                <div class="col-lg-6 col-6 text-left d-flex justify-content-end align-items-center">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(route('user.profile')); ?>" class="nav-link text-white me-3">My Account</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('user.login')); ?>" class="nav-link text-white me-2"><i class="far fa-user me-1"></i> Login</a>
                    <?php endif; ?>

                    <form action="<?php echo e(route('user.shop')); ?>" method="GET" class="d-flex">
                        <input type="text" placeholder="Search For Products" value="<?php echo e(Request::get('Search')); ?>"
                            class="form-control form-control-sm me-1" name="Search">
                        <button type="submit" class="btn btn-sm btn-dark">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

        </nav>
    </div>
</header>
<?php /**PATH D:\laragon\www\auction-car\resources\views/user/include/header.blade.php ENDPATH**/ ?>