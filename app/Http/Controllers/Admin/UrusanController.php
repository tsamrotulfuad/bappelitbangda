<?php

namespace App\Http\Controllers\Admin;

use App\Models\Urusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UrusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $opd = Urusan::limit(10);

            return DataTables::of($opd)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('urusan.show', $row->id).'" class="btn btn-info btn-sm m-1"><i class="bi bi-eye"></i></i></a>';
                    $btn = $btn.'<a href="'.route('urusan.edit', $row->id).'" class="btn btn-warning btn-sm m-1"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn.'<form action="'.route('urusan.destroy', $row->id).'" method="POST" class="d-inline-flex">'.csrf_field().''.method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Yakin Akan Menghapus Data Ini?\')"><i class="bi bi-trash"></i></button>';

                    return $btn; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.urusan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.urusan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $validated = $this->validate($request, [
            'nama'   => 'required'
        ]);

        // create opd data
        Urusan::create($validated);

        // redirect opd index
        return redirect()->route('urusan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Urusan $urusan)
    {
        $urusan = Urusan::findOrFail($urusan->id);
        return view('admin.urusan.detail', compact('urusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Urusan $urusan)
    {
        $urusan = Urusan::findOrFail($urusan->id);
        return view('admin.urusan.edit', compact('urusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Urusan $urusan)
    {
        // validate form
        $validated = $this->validate($request, [
            'nama'   => 'required'
        ]);

        $urusan = Urusan::findOrFail($urusan->id);
        $urusan->update($validated);

        // redirect opd index
        return redirect()->route('urusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Urusan $urusan)
    {
        $urusan = Urusan::findOrFail($urusan->id);
        $urusan->delete();

        // redirect opd index
        return redirect()->route('urusan.index');
    }

    public function data_urusan(Request $request) {
        $term = trim($request->q);
    
        if (empty($term)) {
            $urusan = Urusan::all();
            return response()->json(['data' => $urusan]);
        } else {
            $urusan = Urusan::where('nama', 'like', '%'. $term .'%')->get();
            return response()->json(['data' => $urusan]);
        }
    }
}
