<?php

namespace App\Http\Controllers\Admin\LKPJ;

use App\Models\LkpjUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('frontend.lkpj.dokumen');
    }

    public function lkpj_dokumen_tampil(Request $request)
    {
        if ($request->ajax()) {
            $lkpj = DB::table('lkpj_uploads')->get();

            return DataTables::of($lkpj)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('lkpj.dokumen.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.lkpj.dokumen');
    }

    public function lkpj_dokumen_show(string $id) 
    {
        $lkpj = LkpjUpload::findOrFail($id);
        return response()->download(storage_path('/app/public/lkpj_upload/'.$lkpj->file));
    }

    // Admin
    public function upload_menu()
    {
        return view('admin.lkpj.upload');
    }

    public function lkpj_dokumen_store(Request $request) {
        $lkpj_upload = $request->file('file');
        $filename     = $lkpj_upload->getClientOriginalName();
        $path         = 'lkpj_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($lkpj_upload));

        $data['nama'] = $request->nama;
        $data['file'] = $filename;
        $data['tahun'] = $request->tahun;

        LkpjUpload::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('upload.lkpj.menu');
    }

    public function data_lkpj_upload()
    {
        $data = LkpjUpload::all();
        $path = 'lkpj_upload/';
        
        return response()->json([
            'path' => Storage::disk('public')->url($path),
            'data' => $data,
        ]);
    }
}

