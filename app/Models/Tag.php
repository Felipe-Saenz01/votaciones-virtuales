<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    public function sufragantes(): MorphToMany
    {
        return $this->morphedByMany(Sufragante::class, 'taggable');
    }
}
