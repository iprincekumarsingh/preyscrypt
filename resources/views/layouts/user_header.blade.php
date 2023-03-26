<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-dark">
                    <span class="logo-sm">


                        @php
                        $logo = App\Models\Setting::first();
                        @endphp
                        @if ($logo)
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="22">
                        @endif
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="100px">
                    </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm me-2 font-size-24 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex">

            <!-- App Search-->
            <form class="app-search d-none d-lg-block" action="{{route('user.search_report')}}" method="GET"
                style="display: f">
                <div class="position-relative">

                    <label for="">Date From </label>
                    <input type="date" name="from" class="form-control" style="display:inline-block;width:auto"
                        placeholder="Search...">
                    <label for="">Date To </label>
                    <input type="date" name="to" class="form-control" style="display:inline-block;width:auto"
                        placeholder="Search...">

                    <button class="btn btn-primary" type="submit">Search</button>

                </div>
            </form>


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
                            class="mdi mdi-account-circle font-size-17 align-middle me-1"></i><b> Profile</b></a>
                    @if(Auth::user()->role=='hospital')
                    <a class="dropdown-item" href="{{route('hospital.home')}}">
                        <i class="mdi mdi-account-circle font-size-17 align-middle me-1">
                        </i> Hospital</a>
                    @endif
                    @if(Auth::user()->role=='admin')
                    <a class="dropdown-item" href="{{route('hospital.home')}}"><i
                            class="mdi mdi-account-circle font-size-17 align-middle me-1">
                        </i> Admin</a>
                    @endif

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('logout')}}"><i
                            class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>



        </div>
    </div>
</header>

<div class="topnav" style="display: flex;align-items:center">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">
                            <i class="ti-home me-2"></i>Dashboard
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="ti-file me-2"></i>Reports
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-menu-start dropdown-mega-menu-xl"
                            aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div style="">
                                        @php
                                        $report_catgoires=App\Models\ReportCatgories::all();

                                        $blood_report=App\Models\ReportCatgories::where('report_type','Blood
                                        Report')->get();
                                        @endphp

                                        @foreach ($report_catgoires as $item)
                                        <a href='{{route('user.report_category',$item->id)}}'
                    class='dropdown-item'>{{$item->name}}</a>
                    @endforeach



            </div>
    </div>


</div>

</div>
</li> --}}
<li class="nav-item dropdown mega-dropdown">
    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
        <i class="ti-file me-2"></i>Blood Reports
    </a>

    <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-menu-start dropdown-mega-menu-xl"
        aria-labelledby="topnav-uielement">
        <div class="row">
            <div class="col-lg-4">
                <div style="">
                    @php
                    $report_catgoires=App\Models\ReportCatgories::all();

                    $blood_report=App\Models\ReportCatgories::where('report_type','blood_report')->get();
                    @endphp

                    @foreach ($blood_report as $blood_reports)
                    <a href='{{route('user.report_category',$blood_reports->id)}}'
                        class='dropdown-item'>{{$blood_reports->name}}</a>
                    @endforeach
                </div>
            </div>


        </div>

    </div>
</li>
<li class="nav-item dropdown mega-dropdown">
    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
        <i class="ti-file me-2"></i>Body Reports
    </a>

    <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-menu-start dropdown-mega-menu-xl"
        aria-labelledby="topnav-uielement">
        <div class="row">
            <div class="col-lg-4">
                <div style="">
                    @php
                    $report_catgoires=App\Models\ReportCatgories::all();

                    $blood_report=App\Models\ReportCatgories::where('report_type','body_report')->get();
                    @endphp

                    @foreach ($blood_report as $blood_reports)
                    <a href='{{route('user.report_category',$blood_reports->id)}}'
                        class='dropdown-item'>{{$blood_reports->name}}</a>
                    @endforeach



                </div>
            </div>


        </div>

    </div>
</li>
<li class="nav-item dropdown mega-dropdown">
    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
        <i class="ti-file me-2"></i>Other Reports
    </a>

    <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-menu-start dropdown-mega-menu-xl"
        aria-labelledby="topnav-uielement">
        <div class="row">
            <div class="col-lg-4">
                <div style="">
                    @php
                    $report_catgoires=App\Models\ReportCatgories::all();

                    $ent_report=App\Models\ReportCatgories::where('report_type','ent')->get();
                    @endphp

                    @foreach ($ent_report as $ent_report)
                    <a href='{{route('user.report_category',$ent_report->id)}}'
                        class='dropdown-item'>{{$ent_report->name}}</a>
                    @endforeach



                </div>
            </div>


        </div>

    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('user.prescription')}}">
        <i class="fas fa-file-medical    me-2"></i>Prescription
    </a>
</li>






</ul>
</div>
</nav>
</div>
</div>