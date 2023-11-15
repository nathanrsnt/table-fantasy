<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\PersonagemMagia;


class MagiaController extends Controller
{
    public function index () {
        $magias = json_decode(file_get_contents('https://www.dnd5eapi.co/api/spells'));
        return view('magias.index', compact('magias'));
    }

    public function gerenciar ($id) {

        $personagem = Personagem::findOrFail($id);
        return view('magias.gerenciar_magias', compact('personagem'));
    }

    public function adicionarMagia (Request $request, $id) {
        $personagem = Personagem::findOrFail($id);

        $magiaIndex = $request('magiaIndex');

        $personagemMagia = new PersonagemMagia;
        $personagemMagia->personagem_id = $id;
        $personagemMagia->magia_index = $magiaIndex;

        $personagemMagia->save();
    }
}
