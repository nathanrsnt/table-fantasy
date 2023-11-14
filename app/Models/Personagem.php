<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    use HasFactory;

    //muda o nome da tabela
    protected $table = 'personagens';

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'personagens_grupo', 'personagem_id', 'grupo_id');
    }
}
