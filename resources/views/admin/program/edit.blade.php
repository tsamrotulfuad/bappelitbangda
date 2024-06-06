@extends('admin.app')
@section('breadcrumb', 'Sasaran Misi Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Edit data</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"value="{{ $program->nama }}">
                            </div>
                            <div class="col-md-6">
                                <label for="sasaran_indikator_id" class="form-label">Misi</label>
                                <select class="form-control" id="sasaran_indikator_id" name="sasaran_indikator_id">
                                    <option value="{{ $program->indikator_sasaran->id }}">{{ $program->indikator_sasaran->nama }}</option>
                                 </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('program.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#sasaran_indikator_id').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Indikator",
                ajax: {
                    url: "{{ route('indikator.sasaran')}}",
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term) // search term
                        };
                    },
                    processResults: function({
                        data
                    }) {
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