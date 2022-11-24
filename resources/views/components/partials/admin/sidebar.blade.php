<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('colors.index') }}">Colors</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('banners.index') }}">Banners</a></li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">
        <i class="icon-pie-graph menu-icon"></i>
        <span class="menu-title">Products</span>
        </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('colors.index') }}">
        <i class="icon-command menu-icon"></i>
        <span class="menu-title">Colors</span>
        </a>
        <<<<<<< HEAD </li> --}}
        {{-- <li class="nav-item">
=======
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('banners.index') }}">
            <i class="icon-command menu-icon"></i>
            <span class="menu-title">Banners</span>
            </a>
            </li>
            <li class="nav-item">
                >>>>>>> 4fa87440495aca2fa0199799408226f7851dab24
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="icon-help menu-icon"></i>
                    <span class="menu-title">Role</span>
                </a>
            </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                    @can('admin')
                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> Userlist</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('role.index') }}">Role</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
