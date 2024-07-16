<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="{{ url('asset_pnj/Logo_pnj_icon.jpg') }}" alt="" class="img-fluid" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">TS JTIK <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'Admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Alumni') }}
        </div>

        <!-- Nav Item - Alumni -->
        <li class="nav-item {{ Nav::isRoute('alumni.index') }}">
            <a class="nav-link" href="{{ route('alumni.index') }}">
                <i class="fas fa-user-graduate"></i>
                <span>{{ __('Data Alumni JTIK') }}</span>
            </a>
        </li>

        <!-- Nav Item - Chart Alumni -->
        <li class="nav-item {{ Nav::isRoute('alumni.chart') }}" id="chart alumni" >
            <a class="nav-link" href="{{ route('alumni.chart') }}">
                <i class="fa fa-pie-chart"></i>
                <span>{{ __('Charts Alumni JTIK') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Tracer Study') }}
        </div>

        <!-- Nav Item - Chart Tracer Study -->
        <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-bar-chart"></i>
                    <span>Hasl Kuesioner Tracer Study</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Program Studi:</h6>
                        <a class="collapse-item" href="{{ route('tracer-study.charts_ti') }}">TI (D4)</a>
                        <a class="collapse-item" href="{{ route('tracer-study.charts_tmj') }}">TMJ (D4)</a>
                        <a class="collapse-item" href="{{ route('tracer-study.charts_tmd') }}">TMD (D4)</a>
                        <a class="collapse-item" href="{{ route('tracer-study.charts_tkj') }}">TKJ (D1)</a>
                    </div>
                </div>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Pengguna Alumni') }}
        </div>

        <!-- Nav Item - Invite Pengguna Alumni -->
        <li class="nav-item {{ Nav::isRoute('pengguna-alumni.invitation') }}">
            <a class="nav-link" href="{{ route('pengguna-alumni.invitation') }}">
                <i class="fa-solid fa-envelopes-bulk"></i>
                <span>{{ __('Invite Pengguna Alumni') }}</span>
            </a>
        </li>

        <!-- Nav Item - List Pengguna Alumni -->
        <li class="nav-item {{ Nav::isRoute('pengguna-alumni.index') }}">
            <a class="nav-link" href="{{ route('pengguna-alumni.index') }}">
                <i class="fa-solid fa-user-tie"></i>
                <span>{{ __('List Pengguna Alumni') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Settings') }}
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Nav::isRoute('profile') }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Profile') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
