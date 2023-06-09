<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
// use Illuminate\Foundation\Auth\Sufragante as Authenticatable;

class Sufragante extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'sufragantes';

    protected $fillable = [
        'nombres',
        'email',
        'token',
    ];

    public function getAuthIdentifierName()
    {
        return 'id'; // Nombre del atributo de identificación del usuario
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password; // Nombre del atributo de la contraseña del usuario
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
