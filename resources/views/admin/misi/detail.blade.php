@extends('admin.app')
@section('breadcrumb', 'Misi Daerah')
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
                        <div class="col-md-6 mb-3">
                            <label for="misi" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" value="{{ $misi->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="visi" class="form-label">Visi</label>
                            <input type="text" class="form-control" id="nama" value="{{ $misi->visi->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" readonly>{{ $misi->deskripsi }}</textarea>
                        </div>
                    </div>
                    <a href="{{ route('misi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
