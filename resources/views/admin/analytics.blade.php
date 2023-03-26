@include('layouts.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
    integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.hospital')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">
                <div class="page-title-box">

                    @if(session()->has('success'))

                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> {{session()->get('success')}}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Opps ! </strong> {{session()->get('error')}}
                    </div>
                    @endif

                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Analytics</h6>

                        </div>

                    </div>
                </div>

                @if (Auth::user()->role == 'admin')

                @endif
                <!-- end row -->


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