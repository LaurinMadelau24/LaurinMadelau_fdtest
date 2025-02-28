<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/src/assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/src/assets/css/styles.min.css')}}" />
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                            </a> -->
                                <h4 class="text-center fw-bold text-dark ">Login</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Masukkan Alamat Email...">

                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">

                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-2 rounded-2">Sign
                                        In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        {{-- <p class="fs-4 mb-0 fw-bold">New to Modernize?</p> --}}
                                        <a class="text-primary fw-bold ms-2 mb-4" href="{{url('vw_registrasi')}}">Create an
                                            account</a>
                                    </div>
                                    <a class="text-dark fw-bold mt-4" href="{{url('vw_forgot')}}">Forgot Password ?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>