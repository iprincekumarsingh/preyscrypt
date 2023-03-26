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
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title"> {{$users[0]['name']}} Profile</h6>

                        </div>
                        <div class="col-md-4">
                            <div class="float-end  d-md-block">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-upload">Upload
                                        Report</button>

                                    <div class="col-sm-6 col-md-4 col-xl-3">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="modal fade bs-example-modal-upload" tabindex="-1" role="dialog"
                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Center modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form-horizontal" enctype="multipart/form-data"
                                    action="{{route('hospital.user.upload')}}" method="POST"
                                    class="form-horizontal form-wizard-wrapper">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <input type="hidden" name="user_id" hidden
                                                    value="{{$users[0]['customer_id']}}">
                                                <div class="col-lg-9">
                                                    <label for="">Report Category</label>
                                                    <select id="ddlCreditCardType" name="category_id"
                                                        class="form-select">


                                                        @foreach($report as $reportc)
                                                        <option value="{{$reportc->id}}">{{$reportc->name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <div class="col-lg-9">
                                                    <label for="">Choose Report</label>
                                                    <input type="file" name="file" class="form-control" id="resume">
                                                </div>


                                                <!-- end col -->
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <button class="btn btn-primary btn-lg w-100 waves-effect waves-light"
                                        type="submit">Upload Report</button>
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
            <div class="row">
                <div class="col-xl-3">
                    <div class="user-sidebar">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown">

                                        </div>

                                    </div>
                                </div>
                                <div class="mt-n2 position-relative mt-4">
                                    <div class="text-center">
                                        {{-- <img src="assets/images/users/avatar-1.jpg" alt=""
                                            class="avatar-xl rounded-circle img-thumbnail"> --}}

                                        <div class="mt-3">
                                            {{-- <h5 class="">{{$users[0]['name']}} </h5> --}}
                                        </div>

                                    </div>
                                </div>


                            </div> <!-- end card body -->
                        </div> <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Information</h4>
                            </div>
                            <div class="card-body">

                                <p class="font-size-15 mb-1">Name - {{$users[0]['name']}}</p>
                                <td>
                                    <p class="font-size-15"> <span>Email</span> - {{$users[0]['email']}}</p>
                                </td>

                                <p class="text-muted">Customer Id - {{$users[0]['customer_id']}}</p>
                                <p class="text-muted">Phone - {{$users[0]['phone']}}</p>
                                <p class="text-muted">DOB - {{$users[0]['DOB']}}</p>



                            </div> <!-- end card body -->
                        </div> <!-- end card -->



                    </div>
                </div>

                <div class="col-xl-9">





                    <div class="card-body">

                        <h2 class="title">Report</h2>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>Document Type</th>
                                    <th>Report Number</th>
                                    <th>Date</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user_report as $user_report)

                                <tr>
                                    <td style="color:black">{{$user_report['DocumentType']}}</td>
                                    <td style="color:black">{{$user_report['DocumentNumber']}}</td>

                                    <td>{{$user_report->created_at->format(' d / M  / Y ')}}</td>
                                    <td>
                                        <a style="letter-spaceing:2px"
                                            href="{{route('user.pdf',$user_report->DocumentNumber)}}"><i
                                                class="fas fa-eye    "></i>
                                            View</a>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- @foreach($presription as $user_report)

                                <tr>
                                    <td style="color:black">{{$user_report['DocumentType']}}</td>
                                <td style="color:black">{{$user_report['DocumentNumber']}}</td>

                                <td>{{$user_report->created_at->format(' d / M  / Y ')}}</td>
                                <td>
                                    <a style="letter-spaceing:2px" href="{{route('user.pdf',$user_report->id)}}"><i
                                            class="fas fa-eye    "></i>
                                        View</a>
                                </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!--end row-->

        </div> <!-- container-fluid -->
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

                
                    $('#error_messaage').text(xhr.responseJSON.message);
                    
                    // window.location.reload();
                    location.reload()
                }
                
                
            });
        });
    });
</script>
</body>



</html>