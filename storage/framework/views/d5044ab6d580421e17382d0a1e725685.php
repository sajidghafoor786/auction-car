<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-2">
        <a href="" class="app-brand-link">
              <span class="app-brand-logo demo mb-2">
                <a href="<?php echo e(route('user.home')); ?>" class="text-decoration-none text-dark fw-bold fs-5">
                    <i class="fa fa-car me-2 text-dark"></i> Auction Car
                </a>
              </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="p-2">
        <input
            type="text"
            id="sidebar-search"
            class="form-control"
            placeholder="Search Menu..."
        />
    </div>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item <?php echo e(set_active(['admin.dashboard'])); ?>">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard" data-label="Dashboard">Dashboard</div>
            </a>
        </li>

       
                <li class="menu-header small text-uppercase" id="hide1">
                    <span class="menu-header-text">Users</span>
                </li>
            
                <li class="menu-item <?php echo e(set_active(['createUser', 'listUsers', 'editUser', 'viewUser'])); ?>">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                        <div data-i18n="Admin Users" data-label="Admin Users">Admin Users</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item <?php echo e(set_active(['createUser'])); ?>">
                            <a href="" class="menu-link">
                                <div data-i18n="Add User">Add User</div>
                            </a>
                        </li>
                        <li class="menu-item <?php echo e(set_active(['listUsers'])); ?>">
                            <a href="" class="menu-link">
                                <div data-i18n="List Users">List Users</div>
                            </a>
                        </li>
                    </ul>
                </li>
        
            <li class="menu-item <?php echo e(set_active(['admin.users.create', 'admin.users.index'])); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                    <div data-i18n="Manage Users" data-label="Manage Users">Manage Users</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item <?php echo e(set_active(['admin.users.create'])); ?>">
                        <a href="" class="menu-link">
                            <div data-i18n="Add User">Add User</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo e(set_active(['admin.users.index'])); ?>">
                        <a href="" class="menu-link">
                            <div data-i18n="List Users">List Users</div>
                        </a>
                    </li>
                </ul>
            </li>
     
                <li class="menu-header small text-uppercase" id="hide2">
                    <span class="menu-header-text">Misc</span>
                </li>
          
                <li class="menu-item <?php echo e(set_active(['admin.countries.index', 'admin.countries.create'])); ?>">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-world"></i>
                        <div data-i18n="Manage Countries" data-label="Manage Countries">Manage Countries</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?php echo e(set_active(['admin.countries.create'])); ?>">
                            <a href="" class="menu-link">
                                <div data-i18n="Add Country">Add Country</div>
                            </a>
                        </li>
                        <li class="menu-item <?php echo e(set_active(['admin.countries.index'])); ?>">
                            <a href="<?php echo e(url('category')); ?>" class="menu-link">
                                <div data-i18n="List Country">List Country</div>
                            </a>
                        </li>
                    </ul>
                </li>
    </ul>
</aside>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('sidebar-search');
        const hide1 = document.getElementById('hide1');
        const hide2 = document.getElementById('hide2');

        searchInput.addEventListener('input', function () {
            const search = this.value.toLowerCase();
            const menuItems = document.querySelectorAll('#layout-menu .menu-item');

            if (search.length > 0) {
                hide1.style.display = 'none';
                hide2.style.display = 'none';
            } else {
                hide1.style.display = 'block';
                hide2.style.display = 'block';
            }

            menuItems.forEach(function (item) {
                const labelDiv = item.querySelector('[data-label]');
                if (labelDiv) {
                    const text = labelDiv.getAttribute('data-label').toLowerCase();
                    item.style.display = text.includes(search) ? 'block' : 'none';
                }
            });
        });
    });
</script><?php /**PATH D:\laragon\www\auction-car\resources\views/layout/admin/sidebar.blade.php ENDPATH**/ ?>