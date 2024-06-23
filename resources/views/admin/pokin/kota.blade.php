@extends('admin.app')
@section('breadcrumb', 'Pohon Kinerja')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('pokin.kota.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="indikator" class="form-label">Indikator</label>
                                <input type="text" class="form-control" name="indikator" id="indikator" placeholder="" value="{{ old('indikator') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="parentId" class="form-label">Parent ID</label>
                                <select class="form-select" id="parentId" name="parentId">
                                    
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tema" class="form-label">Tema</label>
                                <select class="form-select" id="tema" name="tema">
                                    <option selected>Pilih Tema</option>
                                    <option value="1">Satu</option>
                                    <option value="2">Dua</option>
                                    <option value="3">Tiga</option>
                                    <option value="4">Empat</option>
                                  </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <table id="pokinKota" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Indikator</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                </tbody>
                </thead>
            </table>
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

            var table = $('#pokinKota').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: "{{ route('pokin.kota') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '12px',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'indikator',
                        name: 'indikator'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            //data select2 untuk parentId
            $('#parentId').select2({
                theme: "bootstrap-5",
                ajax: {
                    url: "{{ route('pokin.kota.cari')}}",
                    dataType: 'json',
                    processResults: function({ data }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            }),
                        }
                    }
                }
            });
        });
    </script>
@endpush