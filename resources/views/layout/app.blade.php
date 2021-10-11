<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | Ensiklopedia Pariwisata Kota Baubau </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('home-assets/img/favicon.ico') }}">

		@include('include.style')

        @stack('addon-style')
         
   </head>

   <body>
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('home-assets/img/logo/pariwisata.png') }}" alt="" style="width: 50px; height: 50px;">
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Preloader Start -->
    @include('include.header')

    <main>

        @yield('content')
	
	    @include('include.script')

        @stack('addon-script')
        
    </body>
</html>