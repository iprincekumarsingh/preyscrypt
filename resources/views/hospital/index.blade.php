
@include('layouts.header')

<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.hospital')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid" >
                
                @if(session()->has('success'))
                <div class="page-title-box">

                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> {{session()->get('success')}}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Opps ! </strong> {{session()->get('error')}}
                    </div>
                </div>
                    @endif

                    {{-- <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Dashboard</h6>

                        </div>
                       
                    </div> --}}

                @if (Auth::user()->role == 'admin')

             


                <div class="row mt-3">
                    <div class="col-xl-3 col-md-6 mb">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/01.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Users</h5>
                                    <h4 class="fw-medium font-size-24">
                                        {{$hospitals->count()}}
                                    </h4>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/02.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Reports</h5>
                                    <h4 class="fw-medium font-size-24">{{$report_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/02.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Prescription</h5>
                                    <h4 class="fw-medium font-size-24">{{$presecription}}
                                        {{-- <i
                                        class="mdi mdi-arrow-up text-success ms-2">
                                    </i> --}}
                                    </h4>

                                    {{--
                                <div class="mini-stat-label bg-info">
                                    <p class="mb-0"> 00%</p>
                                </div> --}}
                                </div>
                                {{-- <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Since last month</p>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/04.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Total Report Categorires</h5>
                                    <h4 class="fw-medium font-size-24">{{$total_report_categorires}}
                                    </h4>
                                    {{-- <div class="mini-stat-label bg-warning">
                                    <p class="mb-0">+ 84%</p>
                                </div> --}}
                                </div>
                                {{-- <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                </div>

                                <p class="text-white-50 mb-0 mt-1">Since last month</p>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end row -->
                
                
                
                @include('admin.index')
                
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>


<!-- Peity chart-->
<script src="assets/libs/peity/jquery.peity.min.js"></script>

<!-- Plugin Js-->
{{-- <script src="assets/libs/chartist/chartist.min.js"></script> --}}
{{-- <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script> --}}

<script src="assets/js/pages/dashboard.init.js"></script>

<script src="assets/js/app.js"></script>



</body>



</html>