<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('_admin') ? 'active': '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('_admin/product*') ? 'active': '' }}">
        <a class="nav-link {{ request()->is('_admin/product*') ? '': 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapse1" class="collapse {{ request()->is('_admin/product*') ? 'show': '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('_admin/product/add-product') ? 'active': '' }}"
                    href="{{ route('admin.add-product') }}">Add New Product</a>
                <a class="collapse-item" href="#">List</a>
                <a class="collapse-item {{ request()->is('_admin/product/add-category') || request()->is('_admin/product/edit-category*') ? 'active': '' }}"
                    href="{{ route('admin.add-cats') }}">Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
            aria-controls="collapse2">
            <i class="fas fa-cart-arrow-down"></i>
            <span>Orders</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">List</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->