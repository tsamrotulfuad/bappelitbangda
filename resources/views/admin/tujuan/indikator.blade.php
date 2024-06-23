@extends('admin.app')
@section('breadcrumb', 'Indikator Tujuan Daerah')
@section('dropmenu', 'show')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $tujuan->nama }}</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-8 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body">
                    <form id="indikatorForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama">
                                    <input type="hidden" class="form-control" name="tujuan_id" id="tujuan_id" value="{{ $tujuan->id }}">
                                </div>
                            </div>
                            <div class="col">
                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" aria-describedby="satuan">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="awal_kinerja" class="form-label">Kondisi Awal Kinerja</label>
                                    <input type="text" class="form-control" name="awal_kinerja" id="awal_kinerja" aria-describedby="awal_kinerja">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="target_kinerja" class="form-label">Target Kinerja Akhir Periode</label>
                                    <input type="text" class="form-control" name="target_kinerja" id="target_kinerja" aria-describedby="target_kinerja">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                                <label for="target" class="form-label">Target</label>
                                <div class="input-group">
                                    <span class="input-group-text">Tahun</span>
                                    <input type="text" class="form-control" name="n" placeholder="N">
                                    <input type="text" class="form-control" name="n_1" placeholder="N+1">
                                    <input type="text" class="form-control" name="n_2" placeholder="N+2">
                                    <input type="text" class="form-control" name="n_3" placeholder="N+3">
                                    <input type="text" class="form-control" name="n_4" placeholder="N+4">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary" id="saveindikator">Simpan</button>
                            <a href="{{ route('tujuan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>           
                    </form>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row my-2">
                            <h5>Urusan</h5>
                        </div>
                        
                        <div class="container">
                            <div class="row mb-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-8 mb-3 mb-sm-0">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row my-2">
                            <h5>Daftar Indikator</h5>
                        </div>
                        <div class="row">
                            <div class="container">
                                <table class="table" id="indikator">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tujuan_indikator as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" id="editIndikator" data-id="{{ $item->id }}">Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" id="addUrusan" data-id="{{ $item->id }}">Urusan</a>
                                                    <a class="btn btn-sm btn-primary" id="addPerangkatDaerah" data-id="{{ $item->id }}">Perangkat Daerah</a>
                                                </td>
                                            </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data belum Tersedia.
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row my-2">
                            <h5>Perangkat Daerah</h5>
                        </div>
                        <div class="container">
                            <div class="row mb-3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade" id="modal-urusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Urusan</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="urusanForm" name="urusanForm">
                    <input type="hidden" class="form-control" name="tujuan_indikator_id" id="nama_indikator">
                    <div class="row mb-3">
                        <div class="col-8">
                            <select class="form-select" id="urusan" name="urusan">
                                
                            </select>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary w-100" type="button" data-id="" id="pilihUrusan">Pilih</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-perangkatdaerah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-8">
                        <select class="form-select" id="perangkat_daerah" name="perangkat_daerah">
                            
                        </select>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('tujuan.index') }}" class="btn btn-primary w-100" type="button">Pilih</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#addUrusan', function () {
                var id = $(this).data('id');
                $('#nama_indikator').val(id);
                console.log(id);
                //open modal
                $('#modal-urusan').modal('show');
            });

            $('body').on('click', '#addPerangkatDaerah', function () {
                var id = $(this).data('id');
                //open modal
                $('#modal-perangkatdaerah').modal('show');
            });

            //data select2 untuk urusan
            $('#urusan').select2({
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('urusan.data')}}",
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

            //data select2 untuk perangkat daerah
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