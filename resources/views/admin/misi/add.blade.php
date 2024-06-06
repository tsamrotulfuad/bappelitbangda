@extends('admin.app')
@section('breadcrumb', 'Misi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('misi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="misi" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan misi daerah" value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="visi_id" class="form-label">Visi</label>
                                <select class="form-control" id="visi_id" name="visi_id">
                                    <option selected disabled>Pilih Visi</option>
                                    @foreach ($visi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->deskripsi }}</option>
                                    @endforeach
                                 </select>
                            </div>
                            <div class="col-md-6">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukkan deskripsi misi daerah" value="{{ old('deskripsi') }}"></textarea>                              
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection