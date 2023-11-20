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
        $gruposIn = Grupo::all();
        $personagens = Personagem::all();
        $personagemGrupo = PersonagemGrupo::all();
        $grupos = [];

        // encontrar os personagens que estão associados a esse grupo
        foreach ($gruposIn as $grupo) {
            if ($grupo->usuario == auth()->user()->id) {
                if (!in_array($grupo, $grupos)) {
                    $grupos [] = $grupo;
                }
            } else {
                foreach ($personagemGrupo as $pg) {
                    if ($pg->grupo_id == $grupo->id) {
                        foreach ($personagens as $personagem) {
                            if ($personagem->id == $pg->personagem_id) {
                                if ($personagem->usuario == auth()->user()->id) {
                                    if (!in_array($grupo, $grupos)) {
                                        $grupos [] = $grupo;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

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
        return redirect()->route('grupos.index')->with('msg', 'Grupo criado com sucesso!');
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

        return redirect()->route('grupos.index')->with('msg', 'Grupo excluído com sucesso!');
    }

    public function gerenciarPersonagens($id) 
    {
        $grupo = Grupo::find($id);
        return view('grupos.gerenciar_personagens', compact('grupo'));
    }

    public function personagens($idGrupo)
    {
        //Chamar todos os personagens que não estão associados a esse grupo
        $personagens = Personagem::all();
        $grupo = Grupo::findOrFail($idGrupo);


        return view('grupos.personagens', compact('grupo', 'personagens'));
    }

    public function addPersonagem(Request $request)
    {
        $personagensGrupo = new PersonagemGrupo();

        $personagensGrupo->personagem_id = $request->input('personagem_id');
        $personagensGrupo->grupo_id = $request->input('grupo_id');  
        $personagensGrupo->save();

        return redirect()->route('grupos.allPersonagens', $request->input('grupo_id'))->with('msg', 'Personagem adicionado com sucesso!');
    }

    public function allPersonagens($idGrupo)
    {
        $grupo = Grupo::findOrFail($idGrupo); // Recupera o grupo pelo ID

        // Recuperar todos os personagens associados a esse grupo.
        $personagens = $grupo->personagens;

        return view('grupos.all_personagens', compact('personagens', 'grupo'));
    }

    public function deletePersonagem($id, $idGrupo)
    {
        $grupo = Grupo::findOrFail($idGrupo);
        $personagemGrupo = PersonagemGrupo::where('personagem_id', $id)->where('grupo_id', $grupo->id)->first();
        $personagemGrupo->delete();
        return redirect()->route('grupos.allPersonagens', $personagemGrupo->grupo_id)->with('msg', 'Personagem removido do grupo com sucesso!');
    }

}
