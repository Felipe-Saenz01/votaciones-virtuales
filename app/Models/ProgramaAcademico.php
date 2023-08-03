<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAcademico extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_programa', 'estado'];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, );
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class); 
    }
}
