<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #005A8D">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="{{ route('archives.index') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/icon/logo.png') }}" style="width: 50px">
            </div>
            <div class="sidebar-brand-text mx-3 text-ligh">E-Filing</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @if (Auth::user()->role == 'superadmin')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Nav::isRoute('archives.index') }}">
                <a class="nav-link" href="{{ route('archives.index') }}">
                    <i class="fas fa-home"></i>
                    <span class="text-light">{{ __('Dashboard') }}</span></a>
            </li>

            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Arsip') }}
            </div>

            <!-- Nav Item - Tambah Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.create') }}">
                <a class="nav-link" href="{{ route('archives.create') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>{{ __('Tambah Arsip') }}</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.history') }}">
                <a class="nav-link" href="{{ route('archives.history') }}">
                    <i class="fas fa-history"></i>
                    <span>{{ __('Riwayat Arsip') }}</span>
                </a>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Kode Arsip') }}
            </div>

            <!-- Nav Item - Riwayat Arsip -->
            <li class="nav-item {{ Nav::isRoute('code_archives.index') }}">
                <a class="nav-link" href="{{ route('code_archives.index') }}">
                    <i class="fas fa-file"></i>
                    <span>Daftar Kode Arsip</span>
                </a>
            </li>

            <!-- Nav Item - Tambah Arsip -->
            <li class="nav-item {{ Nav::isRoute('code_archives.create') }}">
                <a class="nav-link" href="{{ route('code_archives.create') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>{{ __('Tambah Kode Arsip') }}</span>
                </a>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Laporan') }}
            </div>

            <li class="nav-item {{ Nav::isRoute('reports.index') }}">
                <a class="nav-link" href="{{ route('reports.index') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>{{ __('Laporan') }}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('User') }}
            </div>

            <li class="nav-item" {{ Nav::isRoute('users.index') }}>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('Daftar User') }}</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            @elseif (Auth::user()->role == 'admin')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Nav::isRoute('archives.index') }}">
                <a class="nav-link" href="{{ route('archives.index') }}">
                    <i class="fas fa-home"></i>
                    <span class="text-light">{{ __('Dashboard') }}</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Arsip') }}
            </div>

            <!-- Nav Item - Tambah Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.create') }}">
                <a class="nav-link" href="{{ route('archives.create') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>{{ __('Tambah Arsip') }}</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.history') }}">
                <a class="nav-link" href="{{ route('archives.history') }}">
                    <i class="fas fa-history"></i>
                    <span>{{ __('Riwayat Arsip') }}</span>
                </a>
            </li>


            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Laporan') }}
            </div>

            <li class="nav-item {{ Nav::isRoute('reports.index') }}">
                <a class="nav-link" href="{{ route('reports.index') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>{{ __('Laporan') }}</span>
                </a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}

            <!-- Heading -->
            {{-- <div class="sidebar-heading text-white">
                {{ __('User') }}
            </div>

            <li class="nav-item" {{ Nav::isRoute('users.index') }}>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('Daftar User') }}</span>
                </a>
            </li> --}}


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        @elseif (Auth::user()->role == 'user')

            <li class="nav-item {{ Nav::isRoute('archives.index') }}">
                <a class="nav-link" href="{{ route('archives.index') }}">
                    <i class="fas fa-home"></i>
                    <span class="text-light">{{ __('Dashboard') }}</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                {{ __('Arsip') }}
            </div>

            <!-- Nav Item - Tambah Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.create') }}">
                <a class="nav-link" href="{{ route('archives.create') }}">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>{{ __('Tambah Arsip') }}</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Arsip -->
            <li class="nav-item {{ Nav::isRoute('archives.history') }}">
                <a class="nav-link" href="{{ route('archives.history') }}">
                    <i class="fas fa-history"></i>
                    <span>{{ __('Riwayat Arsip') }}</span>
                </a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Laporan') }}
            </div>

            <li class="nav-item {{ Nav::isRoute('reports.index') }}">
                <a class="nav-link" href="{{ route('reports.index') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>{{ __('Laporan') }}</span>
                </a>
            </li>

        @endif


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: #ffffff">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-fw fa-user"></i>
                            <span class="ml-2 d-none d-lg-inline medium"
                                style="color: rgb(0, 0, 0)">{{ Auth::user()->name }}</span>
                            {{-- <figure class="img-user rounded-circle avatar font-weight-bold" data-initial=""></figure> --}}
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('users.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer" style="background-color: #ffffff">
            <div class="container my-auto">
                <div class="copyright text-center my-auto font-weight-bold" style="color: black">
                    <span>Copyright &copy; E-Filing 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
