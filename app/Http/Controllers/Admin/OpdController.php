<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opd;
use Yajra\DataTables\Facades\DataTables;

class OpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $opd = Opd::limit(10);

            return DataTables::of($opd)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('opds.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('opds.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('opds.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';

                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.opd.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.opd.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'kode'   => 'required',
            'nama'   => 'required'
        ]);
        // create opd data
        Opd::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        // redirect opd index
        return redirect()->route('opds.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opd = Opd::findOrFail($id);
        return view('admin.opd.detail', compact('opd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $opd = Opd::findOrFail($id);
        return view('admin.opd.edit', compact('opd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $this->validate($request, [
            'kode'   => 'required',
            'nama'   => 'required'
        ]);

        $opd = Opd::findOrFail($id);
        $opd->update([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        // redirect opd index
        return redirect()->route('opds.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opd = Opd::findOrFail($id);
        $opd->delete();

        // redirect opd index
        return redirect()->route('opds.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function data_perangkatdaerah(Request $request) {
        $term = trim($request->q);
    
        if (empty($term)) {
            $perangkat_daerah = Opd::all();
            return response()->json(['data' => $perangkat_daerah]);
        } else {
            $perangkat_daerah = Opd::where('nama', 'like', '%'. $term .'%')->get();
            return response()->json(['data' => $perangkat_daerah]);
        }
    }
}
