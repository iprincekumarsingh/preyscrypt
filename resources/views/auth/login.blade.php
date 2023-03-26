{{-- inclide --}}
@include('layouts/header')

<title>Login | PRESCRYPT</title>
</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to PRESCRYPT.</p>
                                @php
                                $logo = App\Models\Setting::first();
                                @endphp
                                @if ($logo)
                                <img src="{{asset('uploads/logo/'.$logo->logo)}}" alt="" height="22">
                                @endif
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" method="POST" action="{{route('auth.login')}}">
                                    @csrf
                                    {{-- print all error --}}

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="username"
                                            placeholder="Enter Phone number">
                                        @error('phone')
                                        <div class="error mt-2">{{ $message }}</div>
                                        @enderror

                                        @if (session('error'))
                                        <div class="error mt-2">{{ session('error') }}</div>
                                        @endif
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="userpassword">OTP</label>
                                        <input disabled type="disabled" class="form-control" id="userpassword"
                                            placeholder="Enter password">
                                    </div> --}}

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Send OTP</button>
                                        </div>
                                    </div>

                                    {{-- <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div> --}}

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        {{-- <p>Don't have an account ? <a href="pages-register.html" class="fw-medium text-primary"> Signup now </a> </p> --}}

                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}script>
    <script src=" {{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>


    <script src="{{asset('/assets/js/jquery.js')}}"></script>

</body>

</html>