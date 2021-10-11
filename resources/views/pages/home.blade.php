@extends('layout.app')

@section('title', 'Home')

@section('content')
<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="{{ asset('home-assets/img/hero/pantai-nirwana-sulawesi-tenggara.JPG') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9">
                        <div class="hero__caption">
                            <h1>Visit <span>Baubau</span> </h1>
                            <p>Ensiklopedia Pariwisata Kota Baubau</p>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!-- Testimonial Start -->
<!-- Testimonial Start -->
<div class="testimonial-area testimonial-padding" data-background="{{ asset('home-assets/img/testmonial/testimonial_bg.jpg') }}">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-11 col-lg-11 col-md-9">
                <div class="h1-testimonial-active">
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <div class="testimonial-top-cap">
                                <img src="{{ asset('home-assets/img/icon/testimonial.png') }}" alt="">
                                <p>Ensiklopedia yang menampung semua data-data pariwisata kota Baubau di sektor wisata, perhotelan dan kuliner</p>
                            </div>
                            <!-- founder -->
                            {{-- <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                <div class="founder-img">
                                    <img src="{{ asset('home-assets/img/testmonial/Homepage_testi.png') }}" alt="">
                                </div>
                                <div class="founder-text">
                                    <span>Jessya Inn</span>
                                    <p>Co Founder</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Single Testimonial -->
                </div>
            </div>
        </div>
    </div>
</div>

</main>
@endsection