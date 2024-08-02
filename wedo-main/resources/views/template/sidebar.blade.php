<aside class="main-sidebar sidebar-dark-info elevation-4" style="background-color:#212F3D">
    <a href="{{ url('') }}/panel" class="brand-link">
        <img src="{{ url('') }}/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 img-fluid"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Wedo Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @php
                    $foto="";
                    $data_foto=Auth::user()->foto;

                    if ($data_foto==null) {
                        $foto="profile-none.jpg";
                    }else{
                        $foto="storage/".Auth::user()->foto;
                    }
                @endphp
                <img src="{{url($foto)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="brand-text font-weight-light text-light font-weight-bold"><b
                        style="font-size:15px;">{{Auth::user()->nama}}</b></span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 text-sm">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                <li class="nav-item {{ $title === 'Dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ url('') }}/panel" class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ $tree == 'Wedding Organizer' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $tree === 'Wedding Organizer' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Wedding Organizer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('') }}/store"
                                class="nav-link {{ $subtitle === 'Store' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Store</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('') }}/product"
                                class="nav-link {{ $subtitle === 'Produk' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ $tree === 'Transaksi' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $tree === 'Transaksi' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('') }}/purchase"
                                class="nav-link {{ $subtitle === 'Purchase' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('') }}/history"
                                class="nav-link {{ $subtitle === 'History' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>History</p>
                            </a>
                        </li>
                </li>
            </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('') }}/pengguna" class="nav-link {{ $title === 'Pengguna' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
           
           
            </li>

            {{-- <li class="nav-item {{ $title === 'Ruangan' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $title === 'Ruangan' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-briefcase"></i>
                    <p>
                        Laporan Kegiatan Guru
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html"
                            class="nav-link {{ $title === 'Data Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Class Project</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html"
                            class="nav-link {{ $title === 'Jadwal Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Guest Teacher</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/boxed.html"
                            class="nav-link {{ $title === 'Approval     Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>School Visit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/boxed.html"
                            class="nav-link {{ $title === 'Approval     Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Home Visit</p>
                        </a>
                    </li>
            </li>
            </ul>
            </li> --}}

            {{-- <li class="nav-item {{ $title === 'Ruangan' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $title === 'Ruangan' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                        Alumni
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html"
                            class="nav-link {{ $title === 'Data Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html"
                            class="nav-link {{ $title === 'Jadwal Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Per Tahun Ajaran</p>
                        </a>
                    </li>
            </li>
            </ul>
            </li> --}}

            {{-- <li class="nav-item {{ $title === 'Ruangan' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $title === 'Ruangan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-trophy"></i>
                    <p>
                        Data Prestasi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html"
                            class="nav-link {{ $title === 'Data Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html"
                            class="nav-link {{ $title === 'Jadwal Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Per Departemen</p>
                        </a>
                    </li>
            </li>
            </li>
            </ul>
            </li> --}}

            {{-- <li class="nav-item {{ $title === 'Ruangan' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $title === 'Ruangan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Perpustakaan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html"
                            class="nav-link {{ $title === 'Data Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Laporan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html"
                            class="nav-link {{ $title === 'Jadwal Ruangan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Per Tahun Ajaran</p>
                        </a>
                    </li>
            </li>
            </li>
            </ul>
            </li> --}}

            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('') }}/logout" class="nav-link bg-danger">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
