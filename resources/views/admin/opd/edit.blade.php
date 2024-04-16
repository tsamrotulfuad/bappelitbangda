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
                    <form action="{{ route('opds.update', $opd->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="kode_perangkatdaerah" class="form-label">Kode</label>
                                <input type="text" class="form-control" name="kode" id="kode_perangkatdaerah" value="{{ $opd->kode }}">
                            </div>
                            <div class="col">
                                <label for="nama_perangkatdaerah" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama_perangkatdaerah" value="{{ $opd->nama }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('opds.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

