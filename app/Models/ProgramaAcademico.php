<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAcademico extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_programa', 'idFacultad', 'estado'];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'idFacultad');
    }

}
