<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!---product--->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-products" aria-expanded="false"
                aria-controls="ui-products">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-products">
                <ul class="nav flex-column sub-menu">
                    {{-- @hasrole('admin', 'admin')
                    @endhasrole --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('color.index') }}">Color</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('size.index') }}">Size</a></li>
                </ul>
            </div>
        </li>
        <!---sales--->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-sales" aria-expanded="false"
                aria-controls="ui-sales">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-sales">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.orders') }}">All Orders</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.customer') }}">
                <i class="ti-face-smile menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>
        <!---administrator--->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-Administration" aria-expanded="false"
                aria-controls="ui-Administration">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Administration</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Administration">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('staff.index') }}">Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.index') }}">Role</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('permission.index') }}">Permission</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
