
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fa fa-list-alt mr-2" aria-hidden="true" style="color:#90AFC5"></i>
                        <p>
                            Category
                            <span class="right badge badge-danger mr-10">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fab fa-product-hunt mr-2" style="color:#90AFC5" ></i>
                        <p style="">
                            Product
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sliders.index') }}" class="nav-link">
                        <i class="fas fa-sliders-h mr-2 " style="color:#90AFC5"></i>
                        <p style="">
                            Slider
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class="fas fa-cogs mr-2" style="color:#90AFC5"></i>
                        <p style="">
                            Setting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fa fa-users mr-2" style="color:#90AFC5"></i>
                        <p style="">
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="fab fa-critical-role mr-2" style="color:#90AFC5"></i>
                        <p style="">
                            Roles
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('permissions.create') }}" class="nav-link">
                        <i class="fas fa-user-shield mr-2" style="color:#90AFC5"></i>
                        <p style="">
                            Permission
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

