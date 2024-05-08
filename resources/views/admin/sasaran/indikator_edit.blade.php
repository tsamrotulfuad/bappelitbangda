@extends('admin.app')
@section('breadcrumb', 'Sasaran Misi Daerah')
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
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" value="{{ $indikator->sasaran->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="misi" class="form-label">Misi</label>
                            <input type="text" class="form-control" id="misi" value="{{ $indikator->sasaran->misi->nama }}" readonly>
                        </div>
                    </div>
                    <a href="{{ route('sasaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-3">
        <h4>Data Indikator</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sasaran.indikator.update', $indikator->id )}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Indikator</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $indikator->nama }}" required>
                                <input type="hidden" class="form-control" name="sasaran_id" id="sasaran_id" value="{{ $indikator->sasaran->id }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                        <a href="{{ route('sasaran.indikator', $indikator->sasaran_id) }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection