<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarioElectoral extends Model
{
    use HasFactory;

    protected $fillable = [
        'concepto',
        'fechaInicial',
        'fechaFinal',
        'idPeriodoAcademico',
        'estado',
    ];


    public function PeriodoAcademico(): BelongsTo
    {
        return $this->belongsTo(PeriodoAcademico::class, 'idPeriodoAcademico');
    }
}
