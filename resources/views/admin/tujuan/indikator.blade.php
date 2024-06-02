@extends('admin.app')
@section('breadcrumb', 'Tujuan Misi Daerah')
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
                            <input type="text" class="form-control" id="nama" value="{{ $tujuan->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="misi" class="form-label">Misi</label>
                            <input type="text" class="form-control" id="misi" value="{{ $tujuan->misi->nama }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-3">
        <h4>Data Indikator</h4>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('tujuan.indikator.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="nama" class="form-label">Nama Indikator</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
                                <input type="hidden" class="form-control" name="tujuan_id" id="tujuan_id" value="{{ $tujuan->id }}">
                            </div>
                            <div class="col-md-4">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" value="{{ old('satuan') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kinerja_awal" class="form-label">Kondisi Awal Kinerja</label>
                                <input type="text" class="form-control" name="kinerja_awal" id="kinerja_awal" placeholder="" value="{{ old('kinerja_awal') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="kinerja_akhir" class="form-label">Kondisi Akhir Kinerja</label>
                                <input type="text" class="form-control" name="kinerja_akhir" id="kinerja_akhir" placeholder="" value="{{ old('kinerja_akhir') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="urusan" class="form-label">Urusan</label>
                                <input type="text" class="form-control" name="urusan" id="urusan" placeholder="" value="{{ old('urusan') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="opd" class="form-label">Perangkat Daerah</label>
                                <input type="text" class="form-control" name="opd" id="opd" placeholder="" value="{{ old('opd') }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="{{ route('tujuan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <table id="tujuan" class="table table-striped" style="width:100%">
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
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tujuan.indikator.delete', $item->id) }}" method="POST">
                                        <a href="{{ route('tujuan.indikator.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
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