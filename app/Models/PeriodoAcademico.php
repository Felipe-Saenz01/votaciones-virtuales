<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrePeriodo',
    ];


    //protected $primaryKey = 'idPeriodoAcademico';

    public function calendarioElectorals()
    {
        //Un Periodo Acadaminco puede tener muchos Calendarios Electorales
        return $this->hasMany(CalendarioElectoral::class);
    }
}
