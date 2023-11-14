<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function adicionarMagia ($id) {
        // cakna carau
    }
}
