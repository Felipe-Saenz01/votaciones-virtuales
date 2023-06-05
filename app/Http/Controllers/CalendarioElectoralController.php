<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalendarioElectoral;
use App\Models\CalendarioElectoral;
use App\Models\PeriodoAcademico;
use Illuminate\Http\Request;

class CalendarioElectoralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('calendarioElectoral.index',[
            'calendarioElectorals' => CalendarioElectoral::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('calendarioElectoral.create',[
            'periodos' => PeriodoAcademico::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarioElectoral $request)
    {   
        //return $request->all();
        CalendarioElectoral::create($request->all());
        return redirect()->route('calendario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarioElectoral $calendarioElectoral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarioElectoral $calendarioElectoral)
    {
        return view('calendarioElectoral.edit',[
            'calendario' => $calendarioElectoral,
            'periodos' => PeriodoAcademico::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCalendarioElectoral $request, CalendarioElectoral $calendarioElectoral)
    {
        $calendarioElectoral->update($request->all());

        return redirect()->route('calendario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarioElectoral $calendarioElectoral)
    {
        //
    }
}
