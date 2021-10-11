@extends('admin.layout.app')

@section('title', 'Edit Wisata')

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
                <h3>Edit Wisata</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/wisata">Data Wisata</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Wisata</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data wisata</h4>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('wisata.update', $wisata->id) }}" method="post" enctype="multipart/form-data">
                    @METHOD('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sampul_wisata">Sampul Wisata</label>
                                <input type="file" class="form-control" id="sampul_wisata" name="sampul_wisata">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('foto-wisata/'.$wisata->sampul_wisata) }}" id="category-img-tag" width="500px" alt="Sampul Wisata" class="mt-3 mb-3" />
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_wisata">Nama Wisata</label>
                                {{-- <small class="text-muted">eg.<i>someone@example.com</i></small> --}}
                                <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="{{ $wisata->nama_wisata }}">
                            </div>
    
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10">{{ $wisata->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $wisata->latitude }}">
                        </div>
                        <div class="col-md-6">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $wisata->longitude }}">
                        </div>
                        <div class="col-md-12 mt-5 mb-5">
                            <div id="map"></div>
                        </div>
                    </div>
                    <hr>
                    <h4>Link Foto Tambahan</h4>
                    <div class="alert alert-info mt-3">
                        <h4 class="alert-heading">Petunjuk menginput link foto tambahan</h4>
                        <p>
                            <ol>
                                <li>Pilih gambar yang ada di internet (mis: google)</li>
                                <li>Klik kanan pada gambar dan pilih "view image"</li>
                                <li>Copy URL gambar tersebut dan Paste-kan pada kolom dibawah</li>
                            </ol>
                        </p>
                    </div>
                    <div class="row mt-3">
                        @foreach($wisata->wisata_foto as $key => $value)
                        <div class="col-md-12">
                            <input type="hidden" name="id_wisata[]" value="{{ $value->id }}">
                            <div class="form-group">
                                <label for="">Foto {{++$key}}</label>
                                <input type="text" class="form-control" name="wisata_foto[]" value="{{ $value->foto }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/wisata" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('assets/js/gmaps.js') }}"></script>
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
        
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
        content: "Klik untuk mendapatkan koordinat lokasi di GMaps",
        position: myLatlng,
        });
    
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);


        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#sampul_wisata").change(function(){
        readURL(this);
    });
  
</script>
@endpush