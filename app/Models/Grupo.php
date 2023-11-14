<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function personagens()
    {
        return $this->belongsToMany(Personagem::class, 'personagens_grupo', 'grupo_id', 'personagem_id');
    }
}
