<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.facultades.index', [
            'facultades' => Facultad::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametros.facultades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombrefacultad' => 'required',
        ]);

        //return $request;

        Facultad::create($request->all());

        return redirect()->route('parametros.facultades.index')
            ->with('success', 'Facultad created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facultad $facultad)
    {
        return view('parametros.facultad.show', compact('facultad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facultad $facultad)
    {
        return view('parametros.facultades.edit', compact('facultad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facultad $facultad)
    {
        $request->validate([
            'nombrefacultad' => 'required',
        ]);

        $facultad->update($request->all());

        return redirect()->route('parametros.facultades.index')
            ->with('success', 'Facultad updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facultad $facultad)
    {
        $facultad->delete();

        return redirect()->route('parametros.facultades.index')
            ->with('success', 'Facultad deleted successfully.');
    }
}
