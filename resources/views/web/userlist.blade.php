@include('layouts.header')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet')}}"
    type="text/css">
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css">

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css">

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
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Registered Users</h6>
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
                        </div>
                        @if(Auth::user()->role=="admin")
                        <div class="col-md-4">
                            <div class="float-end d-md-block">
                                <div class="dropdown">
                                    <a class="btn btn-primary  " type="button" data-bs-toggle="modal"
                                        data-bs-target=".bs-example-modal-center" href="#">
                                        Add User(Hospital)
                                    </a>

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- end page title -->

                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <form id="addUserForm" action="{{route('admin.user.add')}}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row" style="    display: flex;
                                            justify-content: center;">
                                                        <div class=",b-4"
                                                            style="display: flex;    justify-content: center;">
                                                        </div>
                                                        <div class="mb-4 ml-2 gap-2" style="margin: 4px">
                                                            <label class="form-label" for="input-date1">Enter
                                                                Role</label>
                                                            <select id="category_name" class="form-control " type="text"
                                                                name="role" id="">
                                                                <option value="">Select Role</option>
                                                                <option value="user">USER</option>
                                                                <option value="hospital">HOSPITAL</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                            {{-- errors show --}}
                                                            @error('name')
                                                            {{$message}}
                                                            @enderror

                                                            <div id="error" class=" mb-0 mt-2">
                                                            </div>
                                                        </div>
                                                        <div class="mb-4" style="margin: 4px">
                                                            <label class="form-label" for="input-date1">Enter
                                                                Name</label>
                                                            <input id="category_name" class="form-control " type="text"
                                                                name="name">

                                                            {{-- errors show --}}
                                                            @error('name')
                                                            {{$message}}
                                                            @enderror

                                                            {{-- <div id="error" class="alert alert-danger mb-0 mt-2">
                                                        </div> --}}
                                                        </div>
                                                        <div class="mb-4" style="margin: 4px">
                                                            <label class="form-label" for="input-date1">Enter
                                                                Phone</label>
                                                            <input id="category_name" class="form-control " type="text"
                                                                name="phone">

                                                            {{-- errors show --}}
                                                            @error('name')
                                                            {{$message}}
                                                            @enderror

                                                            {{-- <div id="error" class="alert alert-danger mb-0 mt-2">
                                                        </div> --}}
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Customer ID</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>DOB</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $user)

                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->customer_id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->dob}}</td>
                                            <td>
                                                {{-- <a style="letter-spacing: 2px"
                                                    href="{{route('hospital.user',[$user->customer_id])}}"><i
                                                    class="fas fa-edit    "></i>
                                                EDIT | </a> --}}
                                                <a style="letter-spaceing:2px"
                                                    href="{{route('hospital.user.profile',$user->id)}}"><i
                                                        class="fas fa-eye    "></i>
                                                    View</a>


                                                    @if(Auth::user()->role=="admin")

                                                    @if($user->status=="active")
                                                    <a style="letter-spaceing:2px;margin-left:8px;color:red"
                                                        href="{{route('admin.staff.block',$user->id)}}"><i
                                                            class="fas fa-trash"></i>
                                                        Block </a>
                                                    @else
                                                    <a style="letter-spaceing:2px;margin-left:8px;color:green"
                                                        href="{{route('admin.staff.unblock',$user->id)}}"><i
                                                            class="fas fa-trash"></i>
                                                        Unblock </a>
                                                    @endif

                                                    @endif  
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


       


    </div>
    <!-- end main content-->

</div>
</div>
</div>


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->




<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
</script>

<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<!-- Plugin Js-->
{{-- <script src="assets/libs/chartist/chartist.min.js"></script> --}}
{{-- <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script> --}}

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>



</body>



</html>