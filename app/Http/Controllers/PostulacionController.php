<?php

namespace App\Http\Controllers;

use App\Models\CalendarioElectoral;
use App\Models\Facultad;
use App\Models\Postulacion;
use App\Models\CuerpoColegiado;
use App\Models\ProgramaAcademico;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index()
    {
        return view('postulaciones.index', [
            'postulaciones' => Postulacion::latest()->paginate()
        ]);
    }

    public function create()
    {
        
        return view('postulaciones.create', [
            'facultades' => Facultad::all(),
            'cuerposColegiados' => CuerpoColegiado::all(),
            'programasAcademicos' => ProgramaAcademico::all(),
            'calendariosElectorales' => CalendarioElectoral::all()
            
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fechaPostulacion' => 'required',
            'cuerpo_colegiado_id' => 'required',
            'programa_academico_id' => 'required',
            'calendario_electoral_id' => 'required',
            'resultadoElectoral' => 'required',
            'facultad' => 'required',
        ]);

        

        Postulacion::create($request->all());

        return redirect()->route('postulaciones.index')
            ->with('success', 'Postulación creada exitosamente.');
    }

    public function edit(Postulacion $postulacion)
    {
        return view('postulaciones.edit', [
            'facultades' => Facultad::all(),
            'cuerposColegiados' => CuerpoColegiado::all(),
            'programasAcademicos' => ProgramaAcademico::all(),
            'calendariosElectorales' => CalendarioElectoral::all(),
            'postulacion' => $postulacion,
            
        ]);
    }

    public function update(Request $request, Postulacion $postulacion)
    {

        $request->validate([
            'fechaPostulacion' => 'required',
            'cuerpo_colegiado_id' => 'required',
            'programa_acedemico_id' => 'required',
            'calendario_electoral_id' => 'required',
            'resultadoElectoral' => 'required',
            'facultad' => 'required',
        ]);

        $postulacion->update($request->all());

        return redirect()->route('postulaciones.index')
            ->with('success', 'Postulación actualizada exitosamente.');
    }

    public function destroy(Postulacion $postulacion)
    {
        $postulacion->delete();

        return redirect()->route('postulaciones.index')
            ->with('success', 'Postulación eliminada exitosamente.');
    }

    public function show(Postulacion $postulacion)
    {
        return view('postulaciones.show', compact('postulacion'));
    }
}
