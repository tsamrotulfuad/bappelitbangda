@extends('admin.app')
@section('breadcrumb', 'Visi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Detail data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="visi" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama"
                                placeholder="Masukkan visi daerah" value="{{ $visi->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi"
                                placeholder="Masukkan deskripsi visi" value="{{ $visi->deskripsi }}" readonly>
                        </div>
                    </div>
                    <a href="{{ route('visi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
