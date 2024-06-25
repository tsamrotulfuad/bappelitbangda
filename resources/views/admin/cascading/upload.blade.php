@extends('admin.app')
@section('breadcrumb', 'Cascading Upload')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cascading.dokumen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Perangkat Daerah" value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="file_cascading" class="form-label">File/Dokumen</label>
                                <input type="file" class="form-control" id="file_cascading" name="file_cascading">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tahun" class="form-label">Tahun</label>
                                <select class="form-select" aria-label="Tahun" name="tahun">
                                    <option selected>Pilih Tahun</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('cascading.upload.view')}}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection