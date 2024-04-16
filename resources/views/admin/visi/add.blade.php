@extends('admin.app')
@section('breadcrumb', 'Visi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('visi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="visi" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan visi daerah" value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi visi" value="{{ old('deskripsi') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection