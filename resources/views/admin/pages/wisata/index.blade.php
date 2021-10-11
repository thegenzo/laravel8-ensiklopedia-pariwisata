@extends('admin.layout.app')

@section('title', 'Wisata')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
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
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Wisata</li>
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
                <a href="{{ route('wisata.create') }}" class="btn btn-primary float-right mb-2">Tambah Wisata</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Wisata</th>
                            <th class="text-center">Sampul</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wisata as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_wisata }}</td>
                            <td class="text-center">
                                <img src="{{ asset('foto-wisata/'.$data->sampul_wisata) }}" alt="Sampul Wisata" style="width: 200px;">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('wisata.show', $data->id) }}" class="btn btn-info">Lihat</a>
                                <a href="{{ route('wisata.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('wisata.destroy', $data->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin ingin menghapus wisata ini?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger d-inline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Kosong. Silahkan Tambahkan Wisata di "Tambah Wisata"</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush