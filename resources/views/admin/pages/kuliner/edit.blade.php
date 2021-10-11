@extends('admin.layout.app')

@section('title', 'Edit Kuliner')

@push('addon-style')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/summernote/summernote.min.css') }}">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kuliner</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/kuliner">Data Kuliner</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kuliner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data kuliner</h4>
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
                <form action="{{ route('kuliner.update', $kuliner->id) }}" method="post" enctype="multipart/form-data">
                    @METHOD('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $kuliner->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sampul_kuliner">Sampul Kuliner</label>
                                <input type="file" class="form-control" id="sampul_kuliner" name="sampul_kuliner" value="{{ $kuliner->sampul_kuliner }}">
                                <img id="category-img-tag" width="500px" alt="" src="{{ asset('foto-kuliner/'.$kuliner->sampul_kuliner) }}" />
                            </div>
                            <div class="form-group">
                                <label for="nama_wisata">Nama Kuliner</label>
                                {{-- <small class="text-muted">eg.<i>someone@example.com</i></small> --}}
                                <input type="text" class="form-control" id="nama_kuliner" name="nama_kuliner" value="{{ $kuliner->nama_kuliner }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control summernote" id="deskripsi" cols="30" rows="10">{{ $kuliner->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="harga">Rp.</span>
                                    <input type="text" class="form-control" aria-describedby="harga" name="harga" value="{{ $kuliner->harga }}">
                                </div>
                            </div>
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
                        <div class="col-md-12">
                            @foreach($kuliner->kuliner_foto as $key => $value)
                            <input type="hidden" name="id_kuliner[]" value="{{ $value->id }}">
                            <div class="form-group">
                                <label for="">Foto {{++$key}}</label>
                                <input type="text" class="form-control" name="kuliner_foto[]" value="{{ $value->foto }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="/kuliner" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('/vendor/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
      
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#sampul_kuliner").change(function(){
        readURL(this);
    });
     
</script>
@endpush