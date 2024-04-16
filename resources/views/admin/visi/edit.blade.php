@extends('admin.app')
@section('breadcrumb', 'Visi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Edit data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('visi.update', $visi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $visi->nama }}">
                            </div>
                            <div class="col">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $visi->deskripsi }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('visi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection