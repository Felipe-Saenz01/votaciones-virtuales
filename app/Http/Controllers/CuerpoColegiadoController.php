<?php

namespace App\Http\Controllers;

use App\Models\cuerpoColegiado;
use Illuminate\Http\Request;

class CuerpoColegiadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('parametros.cuerpo_colegiado.index', [
            'entidades' => CuerpoColegiado::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametros.cuerpo_colegiado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        CuerpoColegiado::create($request->all());

        return redirect()->route('parametros.cuerpo_colegiado.index')
            ->with('success', 'Entidad creada exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(cuerpoColegiado $cuerpoColegiado)
    {
        return view('parametros.cuerpo_colegiado.show', [
            'cuerpoColegiado'=>$cuerpoColegiado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cuerpoColegiado $cuerpoColegiado)
    {
        return view('parametros.cuerpo_colegiado.edit', [
            'cuerpoColegiado'=>$cuerpoColegiado
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cuerpoColegiado $cuerpoColegiado)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $cuerpoColegiado->update($request->all());

        return redirect()->route('parametros.cuerpo_colegiado.index')
            ->with('success', 'Entidad actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cuerpoColegiado $cuerpoColegiado)
    {
        $cuerpoColegiado->delete();

        return redirect()->route('parametros.cuerpo_colegiado.index')
            ->with('success', 'Entidad eliminada exitosamente.');
    }
}
