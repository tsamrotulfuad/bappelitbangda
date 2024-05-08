<?php

namespace App\Http\Controllers\Admin\RPJMD;

use App\Models\Misi;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SasaranIndikator;
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
                    $btn = '<a href="'.route('sasaran.indikator', $row->id).'" class="btn btn-secondary btn-sm m-1"><i class="bi bi-plus"></i></a>';
                    $btn = $btn.'<a href="'.route('sasaran.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('sasaran.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('sasaran.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';
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
        $sasaran = Sasaran::findOrFail($id);
        $misi = Misi::with('tujuan')->get();
        return view('admin.sasaran.edit', compact('sasaran', 'misi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $sasaran_validation = $this->validate($request, [
            'nama'   => 'required',
            'misi_id' => 'required'
        ]);

        $sasaran = Sasaran::findOrFail($id);
        $sasaran->update($sasaran_validation);

        // redirect opd index
        return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sasaran = Sasaran::findOrFail($id);
        $sasaran->delete();

        // redirect opd index
        return redirect()->route('sasaran.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function indikator(string $id)
    {
        $sasaran = Sasaran::findOrFail($id);
        $indikator = SasaranIndikator::with('sasaran')->where('sasaran_id', $sasaran->id)->get();
        return view('admin.sasaran.indikator', compact('sasaran', 'indikator'));
    }

    public function indikator_store(Request $request)
    {
        $indikator = $this->validate($request, [
            'nama'   => 'required',
            'sasaran_id' => 'required'
        ]);

        SasaranIndikator::create($indikator);
        return redirect()->route('sasaran.indikator', $request->sasaran_id);
    }

    public function indikator_delete(string $id)
    {
        $indikator = SasaranIndikator::findOrFail($id);
        $indikator->delete();

        return redirect()->route('sasaran.indikator', $indikator->sasaran_id);
    }

    public function indikator_edit(string $id)
    {
        $indikator = SasaranIndikator::findOrFail($id);
        return view('admin.sasaran.indikator_edit', compact('indikator'));
    }

    public function indikator_update(Request $request, string $id)
    {
        $indikator_validated = $this->validate($request, [
            'nama'   => 'required',
            'sasaran_id' => 'required'
        ]);

        $indikator = SasaranIndikator::findOrFail($id);
        $indikator->update($indikator_validated);

        return redirect()->route('sasaran.indikator', $request->sasaran_id);
    }
}
