@extends('admin.app')
@section('breadcrumb', 'Program Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <h4>Tambah data</h4>
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
                                <label for="indikator_sasaran" class="form-label">Indikator Sasaran</label>
                                <select class="form-control" id="indikator_sasaran" name="indikator_sasaran">
                                    
                                </select>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#indikator_sasaran').select2({
                theme: "bootstrap-5",       
                placeholder: "Pilih Indikator"
            });
        });
    </script>
@endpush