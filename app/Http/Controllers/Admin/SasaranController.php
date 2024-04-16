<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class SasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sasaran = Sasaran::with('misi')->limit(10);

            return DataTables::of($sasaran)
                ->addIndexColumn()
                ->editColumn('misi', function($row) {
                    $nama = $row->misi->nama;
                    return $nama;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('sasaran.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('sasaran.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('sasaran.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';
                    $btn = $btn.'<a href="'.route('sasaran.edit', $row->id).'" class="btn btn-secondary btn-sm m-1"><i class="bi bi-plus"></i></a>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sasaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $misi = Misi::all();
        return view('admin.sasaran.add', compact('misi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $sasaran = $this->validate($request, [
            'nama'   => 'required',
            'misi_id' => 'required'
        ]);
        // create opd data
        Sasaran::create($sasaran);

        // redirect opd index
        return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sasaran = Sasaran::findOrFail($id);
        return view('admin.sasaran.detail', compact('sasaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
