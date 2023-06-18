<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuerpoColegiado extends Model
{
    use HasFactory;


    protected $fillable = ['nombre'];

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}
