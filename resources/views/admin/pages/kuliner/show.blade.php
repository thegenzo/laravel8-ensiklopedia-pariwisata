@extends('admin.layout.app')

@section('title', 'Lihat Kuliner')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kuliner</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Kuliner</li>
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
                <h4 class="card-title">Lihat Kuliner</h4>
            </div>
            <div class="card-body">
                <div class="row mb-5 mt-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <img src="{{ asset('foto-kuliner/'.$kuliner->sampul_kuliner) }}" alt="Sampul Kuliner" style="width: 500px;">
                        <h1 class="mt-5 mb-3 text-center">{{ $kuliner->nama_kuliner }}</h1>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <hr>
                <div class="row mb-5 mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5><p>{{ $kuliner->deskripsi }}. Kuliner ini dibanderol dengan kisaran harga Rp. {{ number_format($kuliner->harga) }}</p></h5>
                    </div>
                    <div class="col-md-2"></div>    
                </div>
                <hr>
                <div class="row mb-5 mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-auto">
                        @foreach ($kuliner->kuliner_foto as $key => $value)
                        <img src="{{ $value->foto }}" alt="" style="max-width:200px;" class="img-responsive d-inline">
                        @endforeach
                    </div>
                    <div class="col-md-2"></div>    
                </div>
                <a href="/kuliner" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection