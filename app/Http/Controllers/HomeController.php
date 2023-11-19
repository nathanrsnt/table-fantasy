<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\Grupo;
use App\Models\PersonagemMagia;


class HomeController extends Controller
{
    public function index() {

        // Requisitar todos os grupos criados nas ultimas 24h
        $grupos = Grupo::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-24 hours')))->get();

        // Requisitar todos os personagens criados nas ultimas 24h
        $personagens = Personagem::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-24 hours')))->get();

        // Requisitar todas as magias adicionadas em personagens nas ultimas 24h
        $personagemMagias = PersonagemMagia::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-24 hours')))->get();
        
        foreach ($personagemMagias as $magia) {
            $magia->personagem = Personagem::find($magia->personagem_id);
        }

        return view('home', compact('grupos', 'personagens', 'personagemMagias'));
    }
}
