<ul id="account-panel" class="nav nav-pills flex-column" >
    <li class="nav-item">
        <a href="<?php echo e(route('user.profile')); ?>"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt"></i> My Profile</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('bidding.history')); ?>"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fa icon fa-gavel "></i>My Biding</a>
    </li>
    <li class="nav-item">
        <a href="change-password.php"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock"></i> Change Password</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('user.logout')); ?>" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
</ul><?php /**PATH D:\laragon\www\auction-car\resources\views/frontend/account/common/sidebar.blade.php ENDPATH**/ ?>