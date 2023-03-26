@include('layouts.header')

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


                        </div>
                        @if (Auth::user()->role == 'admin')

                        @endif
                    </div>
                </div>

                @if (Auth::user()->role == 'admin')
                {{-- <div class="card-body" style="border-bottom:1px solid black;margin-bottom:2px;padding:5px   ">

                    <h4 class="card-title">Update Website Name</h4>
                    <img src="" alt="" srcset="">

                    <div class="mb-5">
                        <form enctype="multipart/form-data" action="{{route('admin.upload.logo')}}" method="POST"
                            action="#">
                            @csrf
                            <input type="text" value="" name="name_website" id="">

                            @if($errors->has('file'))
                            <div class="error" style="color:red">
                                {{$errors->first('file')}}
                            </div>


                            
                            @endif

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Website Name</button>

                        </form><!-- end form -->
                    </div>


                </div> --}}
                <div class="card-body" style="border-bottom:1px solid black;margin-bottom:2px;padding:5px   ">

                    <h4 class="card-title">Upload Logo</h4>
                    <img src="" alt="" srcset="">

                    <div class="mb-5">
                        <form enctype="multipart/form-data" action="{{route('admin.upload.logo')}}" method="POST"
                            action="#">
                            @csrf
                            <input type="file" name="file" id="">

                            @if($errors->has('file'))
                            <div class="error" style="color:red">
                                {{$errors->first('file')}}
                            </div>



                            @endif

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>

                        </form><!-- end form -->
                    </div>


                </div>
                @else

                <h2 class="title">Authorised Person Only</h2>

                <a href="{{url('hospital')}}">Go back to main</a>
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