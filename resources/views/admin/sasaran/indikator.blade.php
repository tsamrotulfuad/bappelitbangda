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
                            <input type="text" class="form-control" id="nama" value="{{ $sasaran->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="misi" class="form-label">Misi</label>
                            <input type="text" class="form-control" id="misi" value="{{ $sasaran->misi->nama }}" readonly>
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
                    <form action="{{ route('sasaran.indikator.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama Indikator</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan indikator sasaran" value="{{ old('nama') }}" required>
                                <input type="hidden" class="form-control" name="sasaran_id" id="sasaran_id" value="{{ $sasaran->id }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <table id="sasaran" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="50px">No.</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($indikator as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sasaran.indikator.delete', $item->id) }}" method="POST">
                                        <a href="{{ route('sasaran.indikator.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection