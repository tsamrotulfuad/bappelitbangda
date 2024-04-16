@extends('admin.app')
@section('breadcrumb', 'Perangkat Daerah')
@section('content')
    <div class="row mb-3">
        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{ route('opds.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
            </div>
            <div class="flex">
                <a href="" class="btn btn-success text-white"><i class="bi bi-file-earmark-arrow-down"></i> Import</a>
                <a href="" class="btn btn-secondary text-white"><i class="bi bi-file-earmark-arrow-up"></i> Export</a>
            </div>            
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="opd" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#opd').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('opds.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    width: '12px',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode',
                    name: 'kode'
                },

                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endpush
