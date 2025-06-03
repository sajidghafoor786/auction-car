<!DOCTYPE html>
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }} /"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Auction Car| Admin Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />

    <script>
        const CSRF = '{{ csrf_token() }}';
    </script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                      

                        <h4 class="mb-2">Welcome to Car Auction</h4>

                        <!-- General Error Messages -->
                        @if(session('error-status'))
                        <div class="alert alert-warning">{{ session('error-status') }}</div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control @if(session('error-email')) is-invalid @endif"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', config('app.env') == 'local' ? 'admin@example.com' : '') }}"
                                    placeholder="Enter email"
                                    required />
                                @if(session('error-email'))
                                <div class="invalid-feedback">
                                    {{ session('error-email') }}
                                </div>
                                @endif
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        class="form-control @if(session('error-password')) is-invalid @endif"
                                        id="password"
                                        name="password"
                                        value="{{ config('app.env') == 'local' ? '12345678' : '' }}"
                                        placeholder="••••••••••"
                                        required />
                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                                @if(session('error-password'))
                                <div class="invalid-feedback">
                                    {{ session('error-password') }}
                                </div>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>