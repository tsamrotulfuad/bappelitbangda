@extends('welcome')
@section('content')
<div class="row text-center mt-5">
    <div class="fs-1">
      Dokumen Pohon Kinerja
    </div>
    <div class="fs-3">
      Kota Pasuruan
    </div>
</div>
<div class="mt-5 mb-5 px-5">
    <table id="pokin_dokumen" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        <tbody>
        </tbody>
        </thead>
    </table>
</div>
@endsection
@push('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#pokin_dokumen').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: "{{ route('pokin.dokumen.tampil')}}",
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
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
</script>
@endpush