@extends('layout.app')

@section('title', 'Baca Kuliner')

@section('content')
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('foto-kuliner/'.$kuliner->sampul_kuliner) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2>{{ $kuliner->nama_kuliner }}</h2>
                   <p class="excert">
                    {{ $kuliner->deskripsi }}
                   </p>
                </div>
                <hr>
                <div class="row mt-5 mb-5">
                    <div class="col-md-12">
                        <h3 class="text-center">Harga kuliner</h3>
                        <h2 class="text-center">Rp. {{ number_format($kuliner->harga) }}</h2>
                    </div>
                </div>
                <hr>
                <div class="row mt-5 mb-5">
                    @foreach ($kuliner->kuliner_foto as $key => $value)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30">
                            <div class="place-img">
                                <img src="{{ $value->foto }}" alt="" style="max-width: 300px;">
                            </div>
                            <div class="place-cap">

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--================ Blog Area end =================-->
@endsection
