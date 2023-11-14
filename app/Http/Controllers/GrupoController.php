<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Personagem;
use App\Models\PersonagemGrupo;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.create');
    }

    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nome = $request->input('nome');
        $grupo->usuario = auth()->user()->id;
        
        //imagem
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $destino = public_path('img/grupos');
            $request->imagem->move($destino, $nomeImagem);
            $grupo->imagem = $nomeImagem;
        }

        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.edit', compact('grupo'));
    }

    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);
        $grupo->nome = $request->input('nome');
        $grupo->usuario = auth()->user()->id;

        //imagem
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $destino = public_path('img/grupos');
            $request->imagem->move($destino, $nomeImagem);
            $grupo->imagem = $nomeImagem;
        }

        $grupo->save();
        return redirect()->route('grupos.index');
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('grupos.index');
    }

    public function gerenciarPersonagens($id) 
    {
        $grupo = Grupo::find($id);
        return view('grupos.gerenciar_personagens', compact('grupo'));
    }

    public function personagens($idGrupo)
    {
        $user = auth()->user();

        if ($user)
        {
            $grupo = Grupo::find($idGrupo);
            #chamar personagens apenas do usuario logado
            $personagens = Personagem::where('usuario', $user->id)->get();
        }

        return view('grupos.personagens', compact('grupo', 'personagens'));
    }

    public function addPersonagem(Request $request)
    {
        $personagensGrupo = new PersonagemGrupo();

        $personagensGrupo->personagem_id = $request->input('personagem_id');
        $personagensGrupo->grupo_id = $request->input('grupo_id');  
        $personagensGrupo->save();

        return redirect()->route('grupos.index');
    }

    public function allPersonagens($idGrupo)
    {
        $grupo = Grupo::findOrFail($idGrupo); // Recupera o grupo pelo ID

        // Recuperar todos os personagens associados a esse grupo.
        $personagens = $grupo->personagens;

        return view('grupos.all_personagens', compact('personagens'));
    }

    public function deletePersonagem($id)
    {
        $personagemGrupo = PersonagemGrupo::where('personagem_id', $id)->get()->first();
        $personagemGrupo->delete();
        return redirect()->route('grupos.index');
    }

}
