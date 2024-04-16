<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tujuan = Tujuan::with('misi')->limit(10);

            return DataTables::of($tujuan)
                ->addIndexColumn()
                ->editColumn('misi', function($row) {
                    $nama = $row->misi->nama;
                    return $nama;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('tujuan.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('tujuan.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('tujuan.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';
                    $btn = $btn.'<a href="'.route('tujuan.edit', $row->id).'" class="btn btn-secondary btn-sm m-1"><i class="bi bi-plus"></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tujuan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $misi = Misi::all();
        return view('admin.tujuan.add', compact('misi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $tujuan = $this->validate($request, [
            'nama'   => 'required',
            'misi_id' => 'required'
        ]);
        // create opd data
        Tujuan::create($tujuan);

        // redirect opd index
        return redirect()->route('tujuan.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return view('admin.tujuan.detail', compact('tujuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $misi = Misi::with('tujuan')->get();
        return view('admin.tujuan.edit', compact('tujuan', 'misi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $tujuan_validation = $this->validate($request, [
            'nama'   => 'required',
            'misi_id' => 'required'
        ]);

        $tujuan = Tujuan::findOrFail($id);
        $tujuan->update($tujuan_validation);

        // redirect opd index
        return redirect()->route('tujuan.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->delete();

        // redirect opd index
        return redirect()->route('tujuan.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
