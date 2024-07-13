<?php

namespace App\Http\Controllers\Admin\RKPD;

use App\Models\RkpdUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('frontend.rkpd.dokumen');
    }

    public function rkpd_dokumen_tampil(Request $request)
    {
        if ($request->ajax()) {
            $rkpd = DB::table('rkpd_uploads')->get();

            return DataTables::of($rkpd)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('rkpd.dokumen.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.rkpd.dokumen');
    }

    public function rkpd_dokumen_show(string $id) 
    {
        $rkpd = RkpdUpload::findOrFail($id);
        return response()->download(storage_path('/app/public/rkpd_upload/'.$rkpd->file));
    }

    // Admin
    public function upload_menu()
    {
        return view('admin.rkpd.upload');
    }

    public function rkpd_dokumen_store(Request $request) {
        $rkpd_upload = $request->file('file');
        $filename     = $rkpd_upload->getClientOriginalName();
        $path         = 'rkpd_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($rkpd_upload));

        $data['nama'] = $request->nama;
        $data['file'] = $filename;
        $data['tahun'] = $request->tahun;

        RkpdUpload::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('upload.rkpd.menu');
    }

    public function data_rkpd_upload()
    {
        $data = RkpdUpload::all();
        $path = 'rkpd_upload/';
        
        return response()->json([
            'path' => Storage::disk('public')->url($path),
            'data' => $data,
        ]);
    }
}
