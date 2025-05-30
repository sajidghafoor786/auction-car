<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="">
    <link rel="icon" type="image/png" href="logo/logo.png">
    <title>
        Register
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet"type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('admin-2/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
</head>

<body>
    <div class="wrapper ">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="content">
                <main class="main-content  mt-0">
                    <div class="page-header align-items-start min-vh-100"
                        style="background-image: url('{{ asset('logo/auth/images.jp') }}');">
                        <span class="mask bg-gradient-light opacity-6"></span>
                        <div class="container my-auto">
                            <div class="row">
                                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                    Sign Up
                                                    <div class="row mt-3">
                                                        <div class="col-12 text-center ms-auto">
                                                            <span class="text-light text-xs font-weight-bold">Sign up to
                                                                start your Session</span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form role="form" class="text-start" method="POST"
                                                action="{{ route('register') }}">
                                                @csrf
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" placeholder="Name">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" placeholder="Email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group input-group-outline my-3">
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group input-group-outline my-3">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                                                   
                                                </div>
                                                <div class="form-check form-check-info text-start ps-0">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        I agree the <a href="javascript:;"
                                                            class="text-dark font-weight-bolder">Terms and
                                                            Conditions</a>
                                                    </label>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit"
                                                        class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                                        up</button>
                                                </div>
                                                <p class="mt-4 text-sm text-center">
                                                    Don't have an account?
                                                    <a href="{{ route('admin.login') }}"
                                                        class="text-primary text-gradient font-weight-bold">Sign
                                                        up</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </main>

    </div>
    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
  <script src="{{ asset('admin-2/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin-2/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-2/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin-2/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin-2/assets/js/plugins/chartjs.min.js') }}"></script>
</body>

</html>
