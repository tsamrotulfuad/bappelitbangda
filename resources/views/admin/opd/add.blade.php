@extends('admin.app')
@section('breadcrumb', 'Perangkat Daerah')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('opds.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="kode_perangkatdaerah" class="form-label">Kode</label>
                                <input type="text" class="form-control" name="kode" id="kode_perangkatdaerah" placeholder="Masukkan singkatan perangkat daerah" value="{{ old('kode') }}">
                            </div>
                            <div class="col-md-8">
                                <label for="nama_perangkatdaerah" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama_perangkatdaerah" placeholder="Masukkan nama perangkat daerah" value="{{ old('nama') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
