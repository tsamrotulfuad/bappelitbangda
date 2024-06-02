<?php

namespace App\Http\Controllers\Admin\RPJMD;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\ProgramIndikator;
use App\Models\SasaranIndikator;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $program = Program::with('indikator_sasaran')->limit(10);

            return DataTables::of($program)
                ->addIndexColumn()
                ->editColumn('indikator_sasaran', function($row) {
                    $sasaran_indikator = $row->indikator_sasaran->nama;
                    return  $sasaran_indikator;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('program.indikator', $row->id).'" class="btn btn-secondary btn-sm m-1"><i class="bi bi-plus"></i></a>';
                    $btn = $btn.'<a href="'.route('program.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('program.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('program.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.program.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $program = $this->validate($request, [
            'nama'   => 'required',
            'sasaran_indikator_id' => 'required'
        ]);
        // create opd data
        Program::create($program);

        // redirect opd index
        return redirect()->route('program.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.detail', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        $sasaran_indikator = SasaranIndikator::with('program')->get();
        return view('admin.program.edit', compact('program', 'sasaran_indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $sasaran_indikator = $this->validate($request, [
            'nama'   => 'required',
            'sasaran_indikator_id' => 'required'
        ]);

        $program = Program::findOrFail($id);
        $program->update($sasaran_indikator);

        // redirect opd index
        return redirect()->route('program.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        // redirect opd index
        return redirect()->route('program.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function indikator(string $id)
    {
        $program = Program::findOrFail($id);
        $indikator = ProgramIndikator::with('program')->where('sasaran_indikator_id', $program->id)->get();
        return view('admin.sasaran.indikator', compact('sasaran', 'indikator'));
    }
}
