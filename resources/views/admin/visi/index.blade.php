@extends('admin.app')
@section('breadcrumb', 'Visi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{ route('visi.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
            </div>
            {{-- <div class="flex">
                <a href="" class="btn btn-success text-white"><i class="bi bi-file-earmark-arrow-down"></i> Import</a>
                <a href="" class="btn btn-secondary text-white"><i class="bi bi-file-earmark-arrow-up"></i>
                    Export</a>
            </div> --}}
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <table id="visi" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
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

        var table = $('#visi').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('visi.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    width: '12px',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },

                {
                    data: 'deskripsi',
                    name: 'deskripsi'
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
