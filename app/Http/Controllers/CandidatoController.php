<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('candidatos.index',[
            'candidatos' => Candidato::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidatos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres_apellidos' => 'required',
        ]);

        Candidato::create($request->all());

        return redirect()->route('candidatos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $candidato)
    {
        return view('candidatos.edit', [
            'candidato' => $candidato
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $candidato)
    {
        $request->validate([
            'nombres_apellidos' => 'required',
        ]);

        $candidato->update($request->all());

        return redirect()->route('candidatos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $candidato)
    {
        $candidato->delete();

        return redirect()->route('candidatos.index')
            ->with('success', 'Candidato eliminado exitosamente.');
    }
}
