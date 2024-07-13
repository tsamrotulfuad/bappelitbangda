<?php

namespace App\Http\Controllers\Admin\RPJMD;

use App\Models\RpjmdUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // tampilan depan
    public function index()
    {
        return view('frontend.rpjmd.dokumen');
    }

    public function rpjmd_dokumen_tampil(Request $request)
    {
        if ($request->ajax()) {
            $rpjmd = DB::table('rpjmd_uploads')->get();

            return DataTables::of($rpjmd)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('rpjmd.dokumen.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.rpjmd.dokumen');
    }

    public function rpjmd_dokumen_show(string $id) 
    {
        $rpjmd = RpjmdUpload::findOrFail($id);
        return response()->download(storage_path('/app/public/rpjmd_upload/'.$rpjmd->file));
    }

    // Admin
    public function upload_menu()
    {
        return view('admin.rpjmd.upload');
    }

    public function rpjmd_dokumen_store(Request $request) {
        $rpjmd_upload = $request->file('file');
        $filename     = $rpjmd_upload->getClientOriginalName();
        $path         = 'rpjmd_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($rpjmd_upload));

        $data['nama'] = $request->nama;
        $data['file'] = $filename;
        $data['tahun'] = $request->tahun;

        RpjmdUpload::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('upload.rpjmd.menu');
    }

    public function data_rpjmd_upload()
    {
        $data = RpjmdUpload::all();
        $path = 'rpjmd_upload/';
        
        return response()->json([
            'path' => Storage::disk('public')->url($path),
            'data' => $data,
        ]);
    }
}
