<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulacions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fechaPostulacion',
        'idCuerpoColegiado',
        'resultadoElectoral',
        'codigo_programa',
        'facultad',
    ];

    public function candidatos(): BelongsToMany
    {
        return $this->belongsToMany(Candidato::class)->withPivot('numero_plancha');
    }

    public function votos()
    {
        return $this->hasMany(Voto::class)->withPivot('cantidad_votos');
    }


    public function cuerpoColegiado()
    {
        return $this->belongsTo(CuerpoColegiado::class);
    }

    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }
}
