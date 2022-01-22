<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://en.gravatar.com/userimage/113950689/77eb1c69d56195c333c573bcf270397e.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">تابش روحانی</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview {{ isActive(['admin.posts.index','admin.posts.create'],'menu-open') }}">
                        <a href="" class="nav-link {{ isActive(['admin.posts.index','admin.posts.create']) }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                               مدیریت پست ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ isActive(['admin.posts.index']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پست ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.create') }}" class="nav-link {{ isActive(['admin.posts.create']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن پست جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ isActive(['admin.categories.index','admin.categories.create'],'menu-open') }}">
                        <a href="" class="nav-link {{ isActive(['admin.categories.index','admin.categories.create']) }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                مدیریت دسته ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ isActive(['admin.categories.index']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.create') }}" class="nav-link {{ isActive(['admin.categories.create']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن دسته جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ isActive(['admin.tags.index','admin.tags.create'],'menu-open') }}">
                        <a href="" class="nav-link {{ isActive(['admin.tags.index','admin.tags.create']) }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                مدیریت تگ ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.tags.index') }}" class="nav-link {{ isActive(['admin.tags.index']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تگ ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.tags.create') }}" class="nav-link {{ isActive(['admin.tags.create']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن تگ جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item has-treeview {{ isActive(['admin.tags.index','admin.tags.create'],'menu-open') }}">
                        <a href="" class="nav-link {{ isActive(['admin.comments.index']) }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                مدیریت دیدگاه ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.comments.index',['approved'=>0]) }}" class="nav-link {{ isActive(['admin.comments.index']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دیدگاه های تایید نشده</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.comments.index',['approved'=>1]) }}" class="nav-link {{ isActive(['admin.comments.index']) }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دیدگاه های تایید شده</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
