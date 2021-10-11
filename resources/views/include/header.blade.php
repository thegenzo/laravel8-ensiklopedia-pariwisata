<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                              <a href="/"><img src="{{ asset('home-assets/img/logo/pariwisata.png') }}" alt="" style="width: 70px; height: 70px;"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>               
                                    <ul id="navigation">                                                                                                                                     
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/lihat-wisata">Wisata</a></li>
                                        <li><a href="/lihat-hotel">Hotel</a></li>
                                        <li><a href="/lihat-kuliner">Kuliner</a></li>
                                        @if(Auth::check())
                                        <li><a href="/admin/dashboard">Dashboard Admin</a></li>
                                        {{-- <form action="{{ url('/logout') }}" method="POST">
                                            @csrf
                                            <li><a><button type="submit">Logout</button></a></li>
                                        </form> --}}
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                        @else
                                        <li><a href="/login">Login</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>