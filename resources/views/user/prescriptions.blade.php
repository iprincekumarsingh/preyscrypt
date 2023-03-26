@include('layouts.header')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet')}}"
    type="text/css">
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css">

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css">
</head>


<body data-topbar="light" data-layout="horizontal" data-layout-size="boxed">
    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('layouts.user_header')

        <div class="main-content">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="my-4 text-center">
                    {{-- <p class="text-muted">Center modal</p> --}}
                    <!-- Small modal -->

                </div>

                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload Prescriptions</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="fileUploadForm" method="POST" action="{{ route('user.upload_prescription') }}"
                                    enctype="multipart/form-data" class="form-horizontal form-wizard-wrapper">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md- ">
                                            <div class="row mb-3" style="display: flex;justify-content:center">

                                                <div class="col-lg-9">
                                                    <label for="">Choose Prescriptions</label>
                                                    <input name="file" type="file" class="form-control" id="resume">
                                                </div>
                                                <span>
                                                    <h4 style="display:block;color:red" id="error_messaage">
                                                        </h1>
                                                </span>


                                                {{-- <input type="hidden" name="category_id" --}}
                                                {{-- value="{{$report_catgoires[0]['id']}}"> --}}
                                                {{-- <input type="hidden" name="category_upload" value="{{$report_catgoires[0]['name']}}">
                                                --}}






                                                <!-- end col -->
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="progress">
                                            <div id="upload_status"
                                                class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-lg w-100 waves-effect waves-light"
                                        type="submit">Upload Prescriptions</button>
                                    <!-- end col -->
                            </div>
                            <!-- end row -->

                            </fieldset>


                            </form>
                        </div>
                    </div>


                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Report - </h6>

                        </div>
                        <div class="col-md-4">
                            <div class="float-end  d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary  dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="modal"
                                        data-bs-target=".bs-example-modal-center" aria-expanded="false">
                                        <i class="fas fa-cloud-upload-alt me-2"></i> Upload Prescription
                                    </button>
                                    {{-- <div class="dropdown-menu dropdown-menu-end">
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



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                        <tr>

                                            <th>Report Name</th>
                                            <th>Document Number</th>
                                            <th>Upload At</th>

                                            <th>Tools</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($prescriptions as $item)

                                        <tr>
                                            {{-- <td>{{$item->DocumentType}}</td> --}}
                                            <td>{{$item->presNumber}}</td>
                                            {{-- show datte  --}}

                                            <td>{{$item->created_at->format(' d / M  / Y ')}}</td>


                                            <td>

                                                <a style="letter-spaceing:2px"
                                                    href="{{route('user.prescription_pdf',$item->presNumber)}}"><i
                                                        class="fas fa-eye    "></i>
                                                    View Report</a>
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

    </div>
    <!-- end main content-->

    </div>


    <!-- JAVASCRIPT -->
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

    <script src="{{asset('assets/js/form.min.js')}}"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                      
                    },
                    complete: function (xhr) {
                      console.log(xhr.responseJSON.message);

                    //   $('#error_messaage').text=xhr.responseJSON.message

                    //   insert text in  html div
                        $('#error_messaage').text(xhr.responseJSON.message);
                        // refresh the page after 3 sec
                        location.reload(true);
                    }
                    
                    // error: function (xhr, status, error) {
                    //     console.log(xhr.error);
                    // }
                });
            });
        });
    </script>

</body>


</html>