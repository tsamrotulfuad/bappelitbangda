@extends('admin.app')
@section('breadcrumb', 'Program Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Tambah Program</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Program Daerah" value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="indikator_utama" class="form-label">IKU/IKD</label>
                                <select class="form-control" id="indikator_utama" name="indikator_utama">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="indikator_program" class="form-label">Indikator Program</label>
                                <input type="text" class="form-control" name="indikator_program" id="indikator_program" placeholder="" value="{{ old('indikator_program') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="satuan" class="form-label">Satuan Program</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="" value="{{ old('satuan') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="perangkat_daerah" class="form-label">Perangkat Daerah</label>
                                <select class="form-control" id="perangkat_daerah" name="perangkat_daerah">
                                    
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="kinerja_awal" class="form-label">Kinerja Awal RPJMD</label>
                                <input type="text" class="form-control" name="kinerja_awal" id="kinerja_awal" placeholder="" value="{{ old('kinerja_awal') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="kinerja_akhir" class="form-label">Capaian Kinerja Akhir</label>
                                <input type="text" class="form-control" name="kinerja_akhir" id="kinerja_akhir" placeholder="" value="{{ old('kinerja_akhir') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="kinerja_akhir_satuan" class="form-label">Satuan Capaian Kinerja Akhir</label>
                                <input type="text" class="form-control" name="kinerja_akhir_satuan" id="kinerja_akhir_satuan" placeholder="" value="{{ old('kinerja_akhir_satuan') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="target" class="form-label">Target</label>
                                <div class="input-group">
                                    <span class="input-group-text">Tahun</span>
                                    <input type="text" class="form-control" name="target_n" placeholder="N">
                                    <input type="text" class="form-control" name="target_n_1" placeholder="N+1">
                                    <input type="text" class="form-control" name="target_n_2" placeholder="N+2">
                                    <input type="text" class="form-control" name="target_n_3" placeholder="N+3">
                                    <input type="text" class="form-control" name="target_n_4" placeholder="N+4">
                                    <input type="text" class="form-control" name="target_n_5" placeholder="N+5">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="rp" class="form-label">Satuan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" name="satuan_n" placeholder="N">
                                    <input type="text" class="form-control" name="satuan_n_1" placeholder="N+1">
                                    <input type="text" class="form-control" name="satuan_n_2" placeholder="N+2">
                                    <input type="text" class="form-control" name="satuan_n_3" placeholder="N+3">
                                    <input type="text" class="form-control" name="satuan_n_4" placeholder="N+4">
                                    <input type="text" class="form-control" name="satuan_n_5" placeholder="N+5">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('program.index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#indikator_utama').select2({
                theme: "bootstrap-5",
                allowClear: true,
                placeholder: "Pilih indikator",
                ajax: {
                    url: "{{ route('tujuan.indikator.data')}}",
                    dataType: 'json',
                    processResults: function({ data }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            }),
                        }
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#perangkat_daerah').select2({
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('perangkatdaerah.data')}}",
                    dataType: 'json',
                    processResults: function({ data }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            }),
                        }
                    }
                }
            });
        });
    </script>
@endpush