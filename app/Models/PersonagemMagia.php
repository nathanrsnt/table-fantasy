<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonagemMagia extends Model
{
    use HasFactory;

     //muda o nome da tabela
     protected $table = 'personagens_magias';
}
