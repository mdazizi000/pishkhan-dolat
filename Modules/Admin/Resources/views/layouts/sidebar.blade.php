<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="font-size: 15PX">تعاونی تامین نیاز کشوری <br>پیشخوان دولت</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">منو</li>
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>داشبورد</p>
                        </a>
                    </li><li class="nav-item">
                        <a href="{{route('admins.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>مدیران</p>
                        </a>
                    </li>
                   <li class="nav-item">
                        <a href="{{route('stockholders.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-file-text"></i>
                            <p>سهامداران</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('stocks.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-file-text"></i>
                            <p>سهام های خریداری شده</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('offices.list')}}" class="nav-link">
                            <i class="nav-icon fa fa-file-text"></i>
                            <p>لیست دفاتر پیشخوان</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('contact.messages')}}" class="nav-link">
                            <i class="nav-icon fa fa-phone-square"></i>
                            <p>لیست تماس های دریافتی</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('contents.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-file-text-o"></i>
                            <p>لیست مقالات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('banners.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-file-text-o"></i>
                            <p>لیست بنر های تبلیغاتی</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
