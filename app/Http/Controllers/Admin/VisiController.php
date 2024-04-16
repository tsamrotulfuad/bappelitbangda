<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $visi = Visi::limit(10);

            return DataTables::of($visi)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('visi.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('visi.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('visi.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';

                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.visi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'nama'   => 'required',
            'deskripsi'   => 'required'
        ]);
        // create opd data
        Visi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        // redirect opd index
        return redirect()->route('visi.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visi = Visi::findOrFail($id);
        return view('admin.visi.detail', compact('visi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visi = Visi::findOrFail($id);
        return view('admin.visi.edit', compact('visi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $this->validate($request, [
            'nama'      => 'required',
            'deskripsi' => 'required'
        ]);

        $visi = Visi::findOrFail($id);
        $visi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        // redirect opd index
        return redirect()->route('visi.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();

        // redirect opd index
        return redirect()->route('visi.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
