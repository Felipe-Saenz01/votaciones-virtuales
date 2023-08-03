<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuerpoColegiado extends Model
{
    use HasFactory;


    protected $fillable = ['nombre'];

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}
