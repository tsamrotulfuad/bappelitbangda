@extends('admin.app')
@section('breadcrumb', 'Program Misi Daerah')
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
                            <input type="text" class="form-control" id="nama" value="{{ $program->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="misi" class="form-label">Misi</label>
                            <input type="text" class="form-control" id="misi" value="{{ $program->indikator_sasaran->nama }}" readonly>
                        </div>
                    </div>
                    <a href="{{ route('program.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection