@extends('admin.app')
@section('breadcrumb', 'Program Daerah')
@section('dropmenu', 'show')
@section('content')
    <div class="row mb-3">
        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{ route('program.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
            </div>
            {{-- <div class="flex">
                <a href="" class="btn btn-success text-white"><i class="bi bi-file-earmark-arrow-down"></i> Import</a>
                <a href="" class="btn btn-secondary text-white"><i class="bi bi-file-earmark-arrow-up"></i>
                    Export</a>
            </div> --}}
        </div>
    </div>
@endsection