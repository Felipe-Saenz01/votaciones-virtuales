<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulacions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fechaPostulacion',
        'cuerpo_colegiado_id',
        'programa_academico_id',
        'calendario_electoral_id',
        'resultadoElectoral',
        'facultad',
    ];

    public function candidatos(): BelongsToMany
    {
        return $this->belongsToMany(Candidato::class)->withPivot('numero_plancha', 'cantidad_votos');
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function cuerpoColegiado()
    {
        return $this->belongsTo(CuerpoColegiado::class);
    }

    public function programaAcademico()
    {
        return $this->belongsTo(ProgramaAcademico::class);
    }

    public function calendarioElectoral()
    {
        return $this->belongsTo(CalendarioElectoral::class);
    }
}
