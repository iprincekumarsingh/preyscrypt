@include('layouts.header')

</head>


<body data-topbar="light" data-layout="horizontal" data-layout-size="boxed">
    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('layouts.user_header')
        <div class="main-content">

            {{-- alert error --}}


            {{-- alert success --}}

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="page-title-box">
                        @if (session('error'))
                        <div class="alert alert-danger  show" role="alert">
                            <strong>{{ session('error') }}</strong>

                        </div>
                        @endif
                        <div class="row   d-lg-none" style="display: flex;justify-content:flex-end;align-items:end"> <button>Search
                                Report</button>
                            <div class="col-md-8  ">

                            </div>

                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">

                        @foreach ($report as $item)

                        <div class="col-lg-6 drop-zone">
                            <a href="{{route('user.pdf',$item->DocumentNumber)}}">

                                <div class="card mb-4 draggable" draggable="true">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-99 p-">
                                                <div class="numbers">
                                                    <div class="d-flex justify-content-between">
                                                        <p
                                                            class="text-sm mb-0 text-capitalize text-dark font-weight-bold">
                                                            Report Type - {{$item->DocumentType}}</p>
                                                        <p
                                                            class="text-sm mb-0 text-capitalize text-dark font-weight-bold">
                                                            Document Number - {{$item->DocumentNumber}}</p>
                                                    </div>

                                                    <div class="d-flex align-items-center my-2">
                                                        <span class=" bg-success-soft text-xxs">

                                                        </span>
                                                        <p class="font-weight-bolder mb-0">
                                                            Uploaded Date -
                                                            {{$item->created_at->format(' d / M  / Y ')}}
                                                        </p>
                                                        {{-- <span class="text-xs font-weight-bolder ms-1">+55%</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" text-end">
                                                <div style="background:#5DA3FA;padding:5px;display:flex;justify-content:center;align-items:center;border-radius:10px "
                                                    class="icon icon-shape bg-green  text-center border-radius-md ms-auto">
                                                    <i class="fas fa-download text-lg opacity-10 "
                                                        style="margin-right: 10px;" aria-hidden="true"></i>
                                                    <h3 style="    color: black;">DOWNLOAD</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                        @endforeach


                    </div>

                    <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




    </div>
    <!-- end main content-->

    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>

    <!-- Plugin Js-->
    <script src="assets/libs/chartist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/veltrix/layouts/layouts-hori-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Mar 2023 11:16:59 GMT -->

</html>