<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-2">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo mb-2">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark fw-bold fs-5">
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
            placeholder="Search Menu..." />
    </div>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ set_active(['admin.dashboard']) }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard" data-label="Dashboard">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase" id="hide1">
            <span class="menu-header-text">Users</span>
        </li>

        <li class="menu-item {{ set_active(['createUser', 'listUsers', 'editUser', 'viewUser']) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div data-i18n="Admin Users" data-label="Admin Users">Admin Users</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ set_active(['createUser']) }}">
                    <a href="{{ route('admin.createUser') }}" class="menu-link">
                        <div data-i18n="Add User">Add User</div>
                    </a>
                </li>
                <li class="menu-item {{ set_active(['listUsers']) }}">
                    <a href="{{ route('admin.listUsers') }}" class="menu-link">
                        <div data-i18n="List Users">List Users</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase" id="hide2">
            <span class="menu-header-text">Misc</span>
        </li>

        <li class="menu-item {{ set_active(['admin.cars.index', 'admin.cars.create'], 'open') }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Manage Car">Manage Cars</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ set_active(['admin.cars.create']) }}">
                    <a href="{{ route('admin.cars.create') }}" class="menu-link">
                        <div data-i18n="Add Car">Add Car</div>
                    </a>
                </li>
                <li class="menu-item {{ set_active(['admin.cars.index']) }}">
                    <a href="{{ route('admin.cars.index') }}" class="menu-link">
                        <div data-i18n="List Car">List Car</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ set_active(['admin.carAuction.index', 'admin.carAuction.create'], 'open') }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              	<i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Manage Auction">Manage Auctions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ set_active(['admin.carAuction.create']) }}">
                    <a href="{{ route('admin.carAuction.create') }}" class="menu-link">
                        <div data-i18n="Add Auction">Add Auction</div>
                    </a>
                </li>
                <li class="menu-item {{ set_active(['admin.carAuction.index']) }}">
                    <a href="{{ route('admin.carAuction.index') }}" class="menu-link">
                        <div data-i18n="List Auctions">List Auctions</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ set_active(['admin.bid.index', 'admin.bid.create'], 'open') }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Manage Bid">Manage Bids</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ set_active(['admin.bid.create']) }}">
                    <a href="{{ route('admin.bid.create') }}" class="menu-link">
                        <div data-i18n="Add Bid">Add Bid</div>
                    </a>
                </li>
                <li class="menu-item {{ set_active(['admin.bid.index']) }}">
                    <a href="{{ route('admin.bid.index') }}" class="menu-link">
                        <div data-i18n="List Bids">List Bids</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('sidebar-search');
        const hide1 = document.getElementById('hide1');
        const hide2 = document.getElementById('hide2');

        searchInput.addEventListener('input', function() {
            const search = this.value.toLowerCase();
            const menuItems = document.querySelectorAll('#layout-menu .menu-item');

            if (search.length > 0) {
                hide1.style.display = 'none';
                hide2.style.display = 'none';
            } else {
                hide1.style.display = 'block';
                hide2.style.display = 'block';
            }

            menuItems.forEach(function(item) {
                const labelDiv = item.querySelector('[data-label]');
                if (labelDiv) {
                    const text = labelDiv.getAttribute('data-label').toLowerCase();
                    item.style.display = text.includes(search) ? 'block' : 'none';
                }
            });
        });
    });
</script>