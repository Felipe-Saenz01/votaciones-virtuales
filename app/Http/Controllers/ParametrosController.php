<?php

namespace App\Http\Controllers;

use App\Models\PeriodoAcademico;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function index()
    {
        $periodos = PeriodoAcademico::latest()->paginate();

        return view('parametros.index', [
            'periodos' => $periodos
        ]);
    }
}
