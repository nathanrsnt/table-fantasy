<?php

namespace App\Http\Controllers;
use App\Models\Personagem;

use Illuminate\Http\Request;

class PersonagemController extends Controller
{
  public function index()
  {
    $personagens = Personagem::where('usuario', auth()->user()->id)->get();
    return view('personagens.index', compact('personagens'));
  }

  public function create()
  {

    // requisita classes e raças da API
    $classes = json_decode(file_get_contents('https://www.dnd5eapi.co/api/classes'));
    $races = json_decode(file_get_contents('https://www.dnd5eapi.co/api/races'));

    return view('personagens.create', compact('classes', 'races')) ;
  }

  public function store(Request $request)
  {

    try {
        $request->validate([
            'nome' => 'required',
            'classe' => 'required',
            'raca' => 'required',
            'nivel' => 'required|numeric',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    } catch (\Throwable $th) {
        return redirect()->route('personagens.create')->with('msg', 'Erro ao criar o personagem! ' . $th->getMessage());
    }

    $personagem = new Personagem;

    $personagem->usuario = auth()->user()->id;
    $personagem->nome = $request->nome;
    $personagem->classe = $request->classe;
    $personagem->raca = $request->raca;
    $personagem->nivel = $request->nivel;
    
    if ($request->hasfile('imagem') && $request->file('imagem')->isValid()) {
        $requestImagem = $request->imagem;
        $extension = $requestImagem->extension();
        $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImagem->move(public_path('img/personagens'), $imagemName);
        $personagem->imagem = $imagemName;
    }
    
    $personagem->save();

    return redirect()->route('personagens.index')->with('msg', 'Personagem cadastrado com sucesso!');;
  }

  public function edit($id)
  {
    $personagem = Personagem::find($id);

    // requisita classes e raças da API
    $classes = json_decode(file_get_contents('https://www.dnd5eapi.co/api/classes'));
    $races = json_decode(file_get_contents('https://www.dnd5eapi.co/api/races'));

    return view('personagens.edit', compact('personagem', 'classes', 'races'));
  }

  public function update(Request $request, $id)
  {
    try {
        $request->validate([
            'nome' => 'required',
            'classe' => 'required',
            'raca' => 'required',
            'nivel' => 'required|numeric',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);
    } catch (\Throwable $th) {
        return redirect()->route('personagens.index')->with('msg', 'Erro ao editar o personagem! ' . $th->getMessage());
    }


    $personagem = Personagem::find($id);
    $personagem->usuario = auth()->user()->id;
    $personagem->nome = $request->nome;
    $personagem->classe = $request->classe;
    $personagem->raca = $request->raca;
    $personagem->nivel = $request->nivel;

    if ($request->hasfile('imagem') && $request->file('imagem')->isValid()) {
        $requestImagem = $request->imagem;
        $extension = $requestImagem->extension();
        $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImagem->move(public_path('img/personagens'), $imagemName);
        $personagem->imagem = $imagemName;
    }

    $personagem->save();

    return redirect()->route('personagens.index')->with('msg', 'Personagem atualizado com sucesso!');
  }

  public function show($id) {
      $personagem = Personagem::findOrFail($id);

      if(isset($personagem)) {
          return view('personagens.show', ['personagem' => $personagem]);
      } else {
          return redirect()->route('personagens.index')->with('msg', 'Personagem não encontrado!');
      }
  }


  public function destroy($id)
  {
    $personagem = Personagem::find($id);
    $personagem->delete();

    return redirect()->route('personagens.index')->with('msg', 'Personagem excluído com sucesso!');
  }
}
