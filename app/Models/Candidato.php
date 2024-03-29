<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres_apellidos',
    ];


    public function Postulacions(): BelongsToMany
    {
        return $this->belongsToMany(Postulacion::class)->withPivot('numero_plancha', 'cantidad_votos');
    }

    public function votos()
    {
        return $this->hasMany(Voto::class)->withPivot('cantidad_votos');
    }
}
