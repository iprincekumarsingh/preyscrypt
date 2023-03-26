<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex" style="    justify-content: center;
        align-items: center;">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-dark">
                    <span class="logo-sm">


                        @php
                        $logo = App\Models\Setting::first();
                        @endphp
                        @if ($logo)
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="22">
                        @else
                        <h3 style="color:black">{{$logo->site_name}}</h3>
                        @endif
                    </span>
                    <span class="logo-lg">
                        @if ($logo)
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" width="100px">
                        @else
                        <h3 style="color:black">{{$logo->site_name}}</h3>
                        @endif
                    </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        @if ($logo)
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="22">
                        @else
                        <h3 style="color:black">{{$logo->site_name}}</h3>
                        @endif

                    </span>
                    <span class="logo-lg">
                        @if ($logo)

                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="18">
                        @else
                        <h3 style="color:black">{{$logo->site_name}}</h3>
                        @endif
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            {{-- <div class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Create <i class="mdi mdi-chevron-down"></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" href="#">Report Category</a>


                    </div>
                </div>
            </div> --}}
        </div>

        <div class="d-flex">
            <!-- App Search-->
            <form action="{{route('hospital.user.search')}}" class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" name="customer_id" placeholder="Search by customer id">
                    <span class="fa fa-search"></span>
                </div>
            </form>

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{Avatar::create(Auth::user()->name)}}"
                        alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('user.profile')}}"><i
                            class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>

                    <a class="dropdown-item text-danger" href="{{route('logout')}}"><i
                            class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>



        </div>
    </div>

</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('hospital.home')}}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('hospital.users')}}" class=" waves-effect">
                        <i class="ti-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                @if(Auth::user()->role=="admin")
                <li>
                    <a href="{{route('admin.staff')}}" class=" waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Hospital Staffs</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->role=="admin")
                {{-- <li>
                    <a href="{{route('admin.analytics')}}" class="waves-effect">
                <i class="fas fa-signal"></i>
                <span>Analytic</span>
                </a>
                </li> --}}

                <li>
                    <a href="{{route('reportCategories')}}" class=" waves-effect">
                        <i class="far fa-clipboard"></i>


                        <span>Report Categories List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.settings')}}" class="waves-effect">
                        <i class="mdi mdi-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="fas fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="waves-effect">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

                @endif



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

</div>