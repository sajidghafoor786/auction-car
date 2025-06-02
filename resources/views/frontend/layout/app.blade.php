<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(' assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset(' assets/css/video-js.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')  }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet"> --}}

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css')  }}">
</head>

<body data-instant-intensity="mousedown">
    <div id="preloader">
        <div class="spinner-wrapper">
            <div class="spinner"></div>
            <div >
                <i class="fa fa-car me-auto" style="text-align: center; display: block;"></i>
                <p >Auction</p>
            </div>
          
            </a>
        </div>
    </div>

    @include('frontend.include.header')
    <main>
        @yield('content')
    </main>

    @include('frontend.include.footer')
</body>

</html>