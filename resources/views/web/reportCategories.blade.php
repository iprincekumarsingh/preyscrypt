@include('layouts.header')

<!-- Begin page -->
<div id="layout-wrapper">



    @include('layouts.hospital')
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">

                    @if(session()->has('success'))

                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> {{session()->get('success')}}
                    </div>
                    @endif
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Report Category</h6>
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li> --}}
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <div class="dropdown">
                                        <a class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target=".bs-example-modal-center" href="#">Add Report Category</a>
    
                                    </div>
                                    {{-- <button class="btn btn-primary  dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-cog me-2"></i> Settings
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Report Categoires</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <form id="addUserForm" action="{{route('report.saveCategories')}}"
                                                method="POST">
                                                @csrf
                                                <div class="row" style="    display: flex;
                                            justify-content: center;">
                                                    <div class=""
                                                        style="display: flex;    justify-content: center;">
                                                        <div class="mb-4 ml-2 gap-2" style="margin: 4px">
                                                            <label class="form-label" for="input-date1">Enter Report
                                                                Categoires name</label>
                                                            <select id="category_name" class="form-control "
                                                                type="text" name="report_type" name="" id="">
                                                                <option value="">Select Report Category</option>
                                                                <option value="blood_report">Blood Report</option>
                                                                <option value="body_report">Body Report</option>
                                                                <option value="ent">Others</option>
                                                            </select>
                                                            {{-- errors show --}}
                                                            @error('name')
                                                            {{$message}}
                                                            @enderror

                                                            <div id="error" class=" mb-0 mt-2">
                                                            </div>
                                                        </div>
                                                        <div class="mb-4" style="margin: 4px">
                                                            <label class="form-label" for="input-date1">Enter Report
                                                                Categoires name</label>
                                                            <input id="category_name" class="form-control "
                                                                type="text" name="name">

                                                            {{-- errors show --}}
                                                            @error('name')
                                                            {{$message}}
                                                            @enderror

                                                            {{-- <div id="error" class="alert alert-danger mb-0 mt-2">
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="btn btn-primary btn-lg w-100 waves-effect waves-light"
                                                        type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
                {{-- table start here --}}
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$category->name}}</td>
                                <td class=""><span class="
                                    alert alert-danger danger" style="text-align: ">Delete <i style="width: 30px" class="ion ion-md-trash"></i>
                                    </span> </td>
                                
                            </tr>
                            @endforeach
                           
                            
                        </tbody>
                        <!-- end tbody -->
                    </table><!-- end table -->
                </div>


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
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>



<!-- Plugin Js-->
{{-- <script src="assets/libs/chartist/chartist.min.js"></script> --}}
{{-- <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script> --}}

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>



</body>



</html>