<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\PersonagemMagia;


class MagiaController extends Controller
{
    public function index ($id) {
        $magias = json_decode(file_get_contents('https://www.dnd5eapi.co/api/spells'));

        $personagem = Personagem::findOrFail($id);
        return view('magias.index', compact('magias'), compact('personagem'));
    }

    public function gerenciar ($id) {

        $personagem = Personagem::findOrFail($id);
        return view('magias.gerenciar_magias', compact('personagem'));
    }

    public function adicionarMagia (Request $request, $id) {
        $personagem = Personagem::findOrFail($id);

        $personagemMagia = new PersonagemMagia;
        $personagemMagia->personagem_id = $id;
        $personagemMagia->magia_name = $request->name;
        $personagemMagia->magia_index = $request->index;

        $personagemMagia->save();

        return redirect()->route('magias.gerenciar', $personagem->id)->with('msg', 'Magia adicionada com sucesso!');
    }

    public function magiasUtilizadas ($id) {
        $personagem = Personagem::findOrFail($id);

        $magias = PersonagemMagia::where('personagem_id', $id)->get();

        foreach ($magias as $magia) {
            $magia->magia = json_decode(file_get_contents('https://www.dnd5eapi.co/api/spells/' . $magia->magia_index));
        }

        return view('magias.magias_utilizadas', compact('personagem'), compact('magias'));
    }

    public function destroy (Request $request, $id) {

        $personagemMagia = PersonagemMagia::where('personagem_id', $id)->where('magia_index', $request->index)->first();
        $personagemMagia->delete();

        return redirect()->route('magias.utilizadas', $personagemMagia->personagem_id)->with('msg', 'Magia removida com sucesso!');
    }

    public function show (Request $request, $id) {
        $magia = json_decode(file_get_contents('https://www.dnd5eapi.co/api/spells/' . $request->index));
        $personagem = Personagem::findOrFail($id);
        return view('magias.show', compact('magia', 'personagem'));
    }
}
