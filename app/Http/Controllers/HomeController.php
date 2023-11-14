<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\Grupo;


class HomeController extends Controller
{
    public function index() {

        // Requisitar todos os grupos criados nas ultimas 24h
        $grupos = Grupo::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-24 hours')))->get();
        $personagens = Personagem::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-24 hours')))->get();

        return view('home', compact('grupos', 'personagens'));
    }
}
