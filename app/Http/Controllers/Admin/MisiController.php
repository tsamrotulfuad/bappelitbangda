<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class MisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $misi = Misi::limit(10);

            return DataTables::of($misi)
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
        return view('admin.misi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visi = Visi::with('misi')->get();
        return view('admin.misi.add', compact('visi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'nama'   => 'required',
            'deskripsi'   => 'required',
            'visi_id' => 'required'
        ]);
        // create opd data
        Misi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'visi_id' => $request->visi_id
        ]);

        // redirect opd index
        return redirect()->route('misi.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $misi = Misi::findOrFail($id);
        return view('admin.misi.detail', compact('misi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $misi = Misi::findOrFail($id);
        $visi = Visi::with('misi')->get();
        return view('admin.misi.edit', compact('misi', 'visi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $this->validate($request, [
            'nama'   => 'required',
            'visi_id'   => 'required',
            'deskripsi'   => 'required'
        ]);

        $misi = Misi::findOrFail($id);
        $misi->update([
            'nama' => $request->nama,
            'visi_id' => $request->visi_id,
            'deskripsi' => $request->deskripsi
        ]);

        // redirect opd index
        return redirect()->route('misi.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $misi = Misi::findOrFail($id);
        $misi->delete();

        // redirect opd index
        return redirect()->route('misi.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
