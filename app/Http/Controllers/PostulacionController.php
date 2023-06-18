<?php

namespace App\Http\Controllers;

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
        $facultades = Facultad::all('id');
        $nombrefacultades = Facultad::all('nombrefacultad');
        $cuerposColegiados = CuerpoColegiado::all();
        $programasAcademicos = ProgramaAcademico::all();


        return view('postulaciones.create', compact('cuerposColegiados', 'programasAcademicos','facultades','nombrefacultades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fechaPostulacion' => 'required',
            'idCuerpoColegiado' => 'required',
            'resultadoElectoral' => 'required',
            'codigo_programa' => 'required',
            'facultad' => 'required',
        ]);

        

        Postulacion::create($request->all());

        return redirect()->route('postulaciones.index')
            ->with('success', 'Postulación creada exitosamente.');
    }

    public function edit(Postulacion $postulacion)
    {
        $nombrefacultades = Facultad::all('nombrefacultad');
        $facultades = Facultad::all();
        $cuerposColegiados = CuerpoColegiado::all();
        $programasAcademicos = ProgramaAcademico::all();
        return view('postulaciones.edit', compact('postulacion', 'cuerposColegiados', 'programasAcademicos','facultades',  'nombrefacultades'));
    }

    public function update(Request $request, Postulacion $postulacion)
    {
        $request->validate([
            'fechaPostulacion' => 'required',
            'idCuerpoColegiado' => 'required',
            'resultadoElectoral' => 'required',
            'codigo_programa' => 'required',
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
