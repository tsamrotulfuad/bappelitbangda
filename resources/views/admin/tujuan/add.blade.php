@extends('admin.app')
@section('breadcrumb', 'Tujuan Misi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tujuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="misi_id" class="form-label">Misi</label>
                                <select class="form-control" id="misi_id" name="misi_id">
                                    <option selected disabled>Pilih Misi</option>
                                    @foreach ($misi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->deskripsi }}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection