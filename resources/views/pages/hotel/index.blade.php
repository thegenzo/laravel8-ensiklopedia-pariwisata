@extends('layout.app')

@section('title', 'Lihat Hotel')

@section('content')
 <!-- slider Area Start-->
 <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('home-assets/img/hero/contact_hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Daftar Hotel</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <!-- slider Area End-->
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @forelse($hotel as $data)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ asset('foto-hotel/'.$data->sampul_hotel) }}" alt="" href="/lihat-hotel/{{ $data->id }}">
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/lihat-hotel/{{ $data->id }}">
                                <h2>{{ $data->nama_hotel }}</h2>
                            </a>
                            <p>{{ Str::limit($data->deskripsi, 100) }}</p>
                        </div>
                    </article>
                    {{ $hotel->links() }}
                    @empty
                    <h2>Data Hotel Kosong</h2>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="/search/lihat-hotel" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Cari Hotel'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Cari Wisata'" name="search">
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection