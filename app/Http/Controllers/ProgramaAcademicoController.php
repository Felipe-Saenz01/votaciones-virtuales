<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\ProgramaAcademico;
use Illuminate\Http\Request;

class ProgramaAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.programa_academico.index',[
            'programas'=>ProgramaAcademico::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $facultades = Facultad::all('id');
        $nombrefacultades = Facultad::all('nombrefacultad');
        return view('parametros.programa_academico.create', compact('facultades','nombrefacultades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'nombre_programa' => 'required',
            'facultad_id' => 'required',
            'estado' => 'required',
        ]);
        
        ProgramaAcademico::create($request->all());

        return redirect()->route('parametros.programas.index')
            ->with('success', 'Programa académico creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramaAcademico $programa)
    {
        return view('parametros.programa_academico.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramaAcademico $programa)
    {
        $nombrefacultades = Facultad::all('nombrefacultad');
        $facultades = Facultad::all();
        return view('parametros.programa_academico.edit', compact('programa', 'facultades',  'nombrefacultades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramaAcademico $programa)
    {
        $request->validate([
            'nombre_programa' => 'required',
            'facultad_id' => 'required',
            'estado' => 'required',
        ]);

        $programa->update($request->all());

        return redirect()->route('parametros.programas.index')
            ->with('success', 'Programa académico actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramaAcademico $programa)
    {
        $programa->delete();

        return redirect()->route('parametros.programas.index')
            ->with('success', 'Programa académico eliminado exitosamente.');
    }
}
