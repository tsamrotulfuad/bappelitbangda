<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CascadingUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CascadingController extends Controller
{
    public function cascading_dokumen() {
        return view('frontend.cascading.dokumen');
    }

    public function cascading_dokumen_tampil(Request $request)
    {
        if ($request->ajax()) {
            $pokin = DB::table('cascading_uploads')->get();

            return DataTables::of($pokin)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('cascading.dokumen.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.cascading.dokumen');
    }

    public function cascading_dokumen_show(string $id) 
    {
        $cascading = CascadingUpload::findOrFail($id);
        return response()->download(storage_path('/app/public/cascading_upload/'.$cascading->file_cascading));
    }

    //Admin
    public function upload_view() {
        return view('admin.cascading.upload');
    }

    public function cascading_dokumen_store(Request $request)
    {
        $cascading_upload = $request->file('file_cascading');
        $filename     = $cascading_upload->getClientOriginalName();
        $path         = 'cascading_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($cascading_upload));

        $data['nama'] = $request->nama;
        $data['file_cascading'] = $filename;
        $data['tahun'] = $request->tahun;

        CascadingUpload::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('cascading.upload.view');
    }

    public function data_cascading_upload()
    {
        $data = CascadingUpload::all();

        return response()->json($data);
    }
}
