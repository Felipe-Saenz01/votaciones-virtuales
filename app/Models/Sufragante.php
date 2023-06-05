<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
// use Illuminate\Foundation\Auth\Sufragante as Authenticatable;

class Sufragante extends Model
{
    use HasFactory;

    protected $table = 'sufragantes';

    protected $fillable = [
        'nombres',
        'email',
        'token',
    ];
}
