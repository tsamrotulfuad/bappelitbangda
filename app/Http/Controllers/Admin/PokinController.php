<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pokin;
use App\Models\PokinUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PokinController extends Controller
{
    // halaman depan pokin struktur
    public function index()
    {
        return view('frontend.pokin.struktur');
    }

    public function pokin_tema1()
    {
        return view('frontend.pokin.pokin_tema1');
    }

    public function pokin_tema2()
    {
        return view('frontend.pokin.pokin_tema2');
    }

    public function pokin_tema3()
    {
        return view('frontend.pokin.pokin_tema3');
    }

    public function pokin_tema4()
    {
        return view('frontend.pokin.pokin_tema4');
    }

    // JSON pokin kota sesuai tema
    public function pokin_kota_tema1()
    {
        $data = DB::table('pokins')->where('tema', '=', 1)->get();
        return response()->json($data);
    }

    public function pokin_kota_tema2()
    {
        $data = DB::table('pokins')->where('tema', '=', 2)->get();
        return response()->json($data);
    }

    public function pokin_kota_tema3()
    {
        $data = DB::table('pokins')->where('tema', '=', 3)->get();
        return response()->json($data);
    }

    public function pokin_kota_tema4()
    {
        $data = DB::table('pokins')->where('tema', '=', 4)->get();
        return response()->json($data);
    }

    // halaman depan pokin dokumen
    public function pokin_dokumen() {
        return view('frontend.pokin.dokumen');
    }

    // download pokin per ID perangkat daerah
    public function pokin_dokumen_show(string $id) 
    {
        $pokin = PokinUpload::findOrFail($id);
        return response()->download(storage_path('/app/public/pokin_upload/'.$pokin->file_pokin));
    }

    public function pokin_dokumen_tampil(Request $request)
    {
        if ($request->ajax()) {
            $pokin = DB::table('pokin_uploads')->get();

            return DataTables::of($pokin)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('pokin.dokumen.show', $row->id).'" class="btn btn-primary btn-sm m-1" target="_blank"><i class="bi bi-download"></i></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pokin.kota');
    }

    // Admin Dashboard
    // Datatables Admin
    public function pokin_kota(Request $request)
    {
        if ($request->ajax()) {
            $pokin = DB::table('pokins')->get();

            return DataTables::of($pokin)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('misi.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('misi.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('misi.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';

                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pokin.kota');
    }

    // Select2 Admin
    public function pokin_kota_cari(Request $request)
    {
        $term = trim($request->q);
    
        if (empty($term)) {
            $pokin = Pokin::all();
            return response()->json(['data' => $pokin]);
        } else {
            $pokin = Pokin::where('name', 'like', '%'. $term .'%')->get();
            return response()->json(['data' => $pokin]);
        }
    }

    public function pokin_kota_store(Request $request)
    {
        Pokin::create([
            'name'      => $request->name,
            'indikator' => $request->indikator,
            'parentId'  => $request->parentId,
            'user_id' => 1,
            'tema' => $request->tema
        ]);

        return redirect()->route('pokin.kota');
    }

    //pokin perangkat daerah
    public function pokin_opd()
    {
        return view('admin.pokin.opd');
    }

    //pokin upload file 
    public function upload_view() {
        return view('admin.pokin.upload');
    }

    public function pokin_dokumen_store(Request $request)
    {
        $pokin_upload = $request->file('file_pokin');
        $filename     = $pokin_upload->getClientOriginalName();
        $path         = 'pokin_upload/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($pokin_upload));

        $data['nama'] = $request->nama;
        $data['file_pokin'] = $filename;

        PokinUpload::create($data);
        toastr()->success('Data berhasil disimpan');

        return redirect()->route('pokin.upload.view');
    }  
}