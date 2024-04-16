@extends('admin.app')
@section('breadcrumb', 'Perangkat Daerah')
@section('content')
    <div class="row mb-3">
        <h4>Detail data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="kode_perangkatdaerah" class="form-label">Kode</label>
                            <input type="text" class="form-control" id="kode_perangkatdaerah" value="{{ $opd->kode }}" readonly>
                        </div>
                        <div class="col">
                            <label for="nama_perangkatdaerah" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_perangkatdaerah" value="{{ $opd->nama }}" readonly>
                        </div>
                    </div>
                    <a href="{{ route('opds.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
