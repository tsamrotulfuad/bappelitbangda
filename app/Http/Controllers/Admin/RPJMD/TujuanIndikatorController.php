<?php

namespace App\Http\Controllers\Admin\RPJMD;

use App\Models\Tujuan;
use Illuminate\Http\Request;
use App\Models\TujuanIndikator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TujuanIndikatorController extends Controller
{
    public function index(string $id) 
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan_indikator = DB::table('tujuan_indikators')->where('tujuan_id', '=', $tujuan->id)->get();
        return view('admin.tujuan.indikator', compact('tujuan', 'tujuan_indikator'));
    }

    public function store(Request $request, string $id) 
    {
        // validasi
        $tujuan_indikator = $this->validate($request, [
            'nama'   => 'required',
            'satuan'   => 'required',
            'awal_kinerja'   => 'required',
            'target_kinerja'   => 'required',
            'n'   => 'required',
            'n_1'   => 'required',
            'n_2'   => 'required',
            'n_3'   => 'required',
            'n_4'   => 'required',
            'tujuan_id' => 'required',
        ]);
        //simpan data
        TujuanIndikator::create($tujuan_indikator);
        //kembalikan ke route index
        return redirect()->route('tujuan.index');
    }

    public function edit(string $id)
    {
        $tujuan_indikator = TujuanIndikator::findOrFail($id);
        return response()->json([
            'data' => $tujuan_indikator,
        ]);
    }

    public function tujuan_indikator_data(Request $request)
    {
        $term = trim($request->q);
    
        if (empty($term)) {
            $tujuan_indikator = TujuanIndikator::all();
            return response()->json(['data' => $tujuan_indikator]);
        } else {
            $tujuan_indikator = TujuanIndikator::where('nama', 'like', '%'. $term .'%')->get();
            return response()->json(['data' => $tujuan_indikator]);
        }
    }
}
