@extends('admin.layout.app')

@section('title', 'Lihat Wisata')

@push('addon-style')
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Wisata</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Wisata</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lihat Wisata</h4>
            </div>
            <div class="card-body">
                <div class="row mb-5 mt-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <img src="{{ asset('foto-wisata/'.$wisata->sampul_wisata) }}" alt="Sampul Wisata" style="width: 500px;">
                        <h1 class="mt-5 mb-3 text-center">{{ $wisata->nama_wisata }}</h1>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <hr>
                <div class="row mb-5 mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5><p>{{ $wisata->deskripsi }}</p></h5>
                    </div>
                    <div class="col-md-2"></div>    
                </div>
                <hr>
                <div class="row mb-5 mt-5">
                    <div class="col-md-12 mt-5 mb-5">
                        <div id="map"></div>
                    </div>
                </div>
                <hr>
                <div class="row mb-5 mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-auto">
                        @foreach ($wisata->wisata_foto as $key => $value)
                        <img src="{{ $value->foto }}" alt="" style="max-width:200px;" class="img-responsive d-inline">
                        @endforeach
                    </div>
                    <div class="col-md-2"></div>    
                </div>
                <a href="/wisata" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
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