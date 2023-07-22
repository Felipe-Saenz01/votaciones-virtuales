<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';

    protected $primaryKey = 'idpostulacion';

    protected $fillable = [
        'fechaPostulacion',
        'idCuerpoColegiado',
        'resultadoElectoral',
        'codigo_programa',
        'facultad',
    ];

    public function cuerpoColegiado()
    {
        return $this->belongsTo(cuerpoColegiado::class, 'idCuerpoColegiado');
    }

    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class, 'codigo_programa');
    }
}
