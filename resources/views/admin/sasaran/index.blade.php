@extends('admin.app')
@section('breadcrumb', 'Sasaran Misi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{ route('sasaran.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
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
            <table id="sasaran" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Misi</th>
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

        var table = $('#sasaran').DataTable({
            className: 'details-control',
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('sasaran.index') }}",
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
                    data: 'misi',
                    name: 'misi'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#sasaran tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    </script>
@endpush