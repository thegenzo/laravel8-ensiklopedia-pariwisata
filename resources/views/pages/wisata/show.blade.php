@extends('layout.app')

@section('title', 'Baca Wisata')

@push('addon-style')
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endpush

@section('content')
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('foto-wisata/'.$wisata->sampul_wisata) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2>{{ $wisata->nama_wisata }}</h2>
                   <p class="excert">
                    {{ $wisata->deskripsi }}
                   </p>
                </div>
                <hr>
                <div class="row mt-5 mb-5">
                    <div class="col-md-12">
                        <div id="map"></div>
                    </div>
                </div>
                <hr>
                <div class="row mt-5 mb-5">
                    @foreach ($wisata->wisata_foto as $key => $value)
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

@push('addon-script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiCgqFCjR9uNOe1BJ9-QN8-SS6r6d07Ik&callback=initMap&libraries=&v=weekly"
async
></script>

<script type="text/javascript">
    function initMap() {
        const myLatlng = { lat: {{$wisata->latitude}}, lng: {{$wisata->longitude}} };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: myLatlng,
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
    }
</script>
@endpush