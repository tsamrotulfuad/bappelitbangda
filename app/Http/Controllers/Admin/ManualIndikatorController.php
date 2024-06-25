<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ManualIndikator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ManualIndikatorController extends Controller
{
    public function manual_indikator_dokumen()
    {
        return view('frontend.manual_indikator.dokumen');
    }

    public function manual_indikator_tampil(Request $request)
    {
        if ($request->ajax()) {
            $manual_indikator = DB::table('manual_indikators')->get();

            return DataTables::of($manual_indikator)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('manual.indikator.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.manual_indikator.dokumen');
    }

    public function manual_indikator_show(string $id) 
    {
        $manual_indikator = ManualIndikator::findOrFail($id);
        return response()->download(storage_path('/app/public/manual_indikator_upload/'.$manual_indikator->file));
    }

    //Admin
    public function upload_view() {
        return view('admin.manual_indikator.upload');
    }

    public function manualindikator_dokumen_store(Request $request) 
    {
        $manul_indikator_upload = $request->file('file');
        $filename     = $manul_indikator_upload->getClientOriginalName();
        $path         = 'manual_indikator_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($manul_indikator_upload));

        $data['nama'] = $request->nama;
        $data['file'] = $filename;
        $data['tahun'] = $request->tahun;

        ManualIndikator::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('manualindikator.upload.view');
    }

    public function data_manual_indikator_upload()
    {
        $data = ManualIndikator::all();

        return response()->json($data);
    }
}
