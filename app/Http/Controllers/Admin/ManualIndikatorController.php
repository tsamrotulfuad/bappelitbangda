<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManualIndikator;
use Illuminate\Support\Facades\Storage;

class ManualIndikatorController extends Controller
{
    public function manual_indikator_dokumen()
    {
        return view();
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
}
