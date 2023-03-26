@include('layouts.header')
<style>
    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
    }

    .file-upload .square {
        height: 250px;
        width: 250px;
        margin: auto;
        vertical-align: middle;
        border: 1px solid #e5dfe4;
        background-color: #fff;
        border-radius: 5px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.6;
        color: #29292e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e5dfe4;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 5px;
        -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
</style>
</head>


<body data-topbar="light" data-layout="horizontal" data-layout-size="boxed">
    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('layouts.user_header')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Page title -->


                    <div class="my-5">
                        <h3>My Profile</h3>
                        <hr>
                    </div>
                    <!-- Form START -->
                    <form class="file-upload" action="{{route('user.update_profile')}}" method="POST>
                        @csrf
                        <div class=" row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">My Profile</h4>
                                    @if (session('success'))
                                    <div class="alert alert-success  show" role="alert">
                                        <strong>{{ session('success') }}</strong>

                                    </div>
                                    @endif
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label"> Name *</label>
                                        <input name="name" type="text" class="form-control" placeholder=""
                                            aria-label="First name" value="{{Auth::user()->name}}">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <!-- Last name -->
                                    {{-- <div class="col-md-6">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Last name" value="Doe">
                                        </div> --}}
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="{{Auth::user()->phone}}">

                                    </div>
                                    <!-- Mobile number -->
                                    {{-- <div class="col-md-6">
                                            <label class="form-label">Mobile number *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Phone number" value="+91 9852 8855 252">
                                        </div> --}}
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input name="email" type="email" class="form-control" id="inputEmail4"
                                            value="{{Auth::user()->email}}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <!-- Skype -->
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth *</label>

                                        <input name="dob" type="date" class="form-control" placeholder=""
                                            aria-label="Phone number" value="{{Auth::user()->dob}}">
                                        @if ($errors->has('dob'))
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                        @endif
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <!-- Upload profile -->
                        {{-- <div class="col-xxl-4">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                                        <div class="text-center">
                                            <!-- Image upload -->
                                            <div class="square position-relative display-2 mb-3">
                                                <i
                                                    class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
                                            </div>
                                            <!-- Button -->
                                            <input type="file" id="customFile" name="file" hidden="">
                                            <label class="btn btn-success-soft btn-block"
                                                for="customFile">Upload</label>
                                            <button type="button" class="btn btn-danger-soft">Remove</button>
                                            <!-- Content -->
                                            <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size
                                                300px x 300px</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                </div> <!-- Row END -->

                <!-- Social media detail -->
                {{-- <div class="row mb-5 gx-5">
                            <div class="col-xxl-6 mb-5 mb-xxl-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Social media detail</h4>
                                        <!-- Facebook -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fab fa-fw fa-facebook me-2 text-facebook"></i>Facebook
                                                *</label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Facebook"
                                                value="http://www.facebook.com">
                                        </div>
                                        <!-- Twitter -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fab fa-fw fa-twitter text-twitter me-2"></i>Twitter *</label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Twitter"
                                                value="http://www.twitter.com">
                                        </div>
                                        <!-- Linkedin -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fab fa-fw fa-linkedin-in text-linkedin me-2"></i>Linkedin
                                                *</label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Linkedin"
                                                value="http://www.linkedin.com">
                                        </div>
                                        <!-- Instragram -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fab fa-fw fa-instagram text-instagram me-2"></i>Instagram
                                                *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Instragram" value="http://www.instragram.com">
                                        </div>
                                        <!-- Dribble -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fas fa-fw fa-basketball-ball text-dribbble me-2"></i>Dribble
                                                *</label>
                                            <input type="text" class="form-control" placeholder="" aria-label="Dribble"
                                                value="http://www.dribble.com">
                                        </div>
                                        <!-- Pinterest -->
                                        <div class="col-md-6">
                                            <label class="form-label"><i
                                                    class="fab fa-fw fa-pinterest text-pinterest"></i>Pinterest
                                                *</label>
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Pinterest" value="http://www.pinterest.com">
                                        </div>
                                    </div> <!-- Row END -->
                                </div>
                            </div>

                            <!-- change password -->
                            <div class="col-xxl-6">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="my-4">Change Password</h4>
                                        <!-- Old password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <!-- New password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword2" class="form-label">New password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2">
                                        </div>
                                        <!-- Confirm password -->
                                        <div class="col-md-12">
                                            <label for="exampleInputPassword3" class="form-label">Confirm Password
                                                *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                <!-- Row END -->
                <!-- button -->
                <div class="gap-3 mb-3 d-md-flex justify-content-md-end text-center">
                    {{-- <button type="button" class="btn btn-danger btn-lg">Delete profile</button> --}}
                    <button type="submit" class="btn btn-primary btn-lg">Update profile</button>
                </div>
                </form> <!-- Form END -->
            </div>
        </div>
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