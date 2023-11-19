<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\PersonagemItem;

class ItemController extends Controller
{
    public function index($id)
    {
        $itens = json_decode(file_get_contents('https://www.dnd5eapi.co/api/equipment'));
        $personagem = Personagem::findOrFail($id);

        return view('itens.index', compact('itens'), compact('personagem'));
    }

    public function gerenciar($id)
    {
        $personagem = Personagem::findOrFail($id);

        return view('itens.gerenciar_itens', compact('personagem'));
    }

    public function adicionarItem(Request $request, $id)
    {
        $personagem = Personagem::findOrFail($id);
        $personagemItem = new PersonagemItem;

        $personagemItem->personagem_id = $id;
        $personagemItem->name = $request->name;
        $personagemItem->index = $request->index;
        $personagemItem->quantidade = $request->quantidade;
        $personagemItem->save();

        return redirect()->route('itens.gerenciar', $personagem->id)->with('msg', 'Item adicionado com sucesso!');
    }

    public function itensUtilizados($id)
    {
        $personagem = Personagem::findOrFail($id);
        $itens = PersonagemItem::where('personagem_id', $id)->get();

        foreach ($itens as $item) {
            $item->item = json_decode(file_get_contents('https://www.dnd5eapi.co/api/equipment/' . $item->index));
        }

        return view('itens.itens_utilizados', compact('personagem'), compact('itens'));
    }

    public function destroy(Request $request, $id)
    {
        $personagemItem = PersonagemItem::where('personagem_id', $id)->where('index', $request->index)->first();
        $personagemItem->delete();

        return redirect()->route('itens.utilizados', $personagemItem->personagem_id)->with('msg', 'Item removido com sucesso!');
    }

    public function show(Request $request, $id)
    {
        $item = json_decode(file_get_contents('https://www.dnd5eapi.co/api/equipment/' . $request->index));
        $personagem = Personagem::findOrFail($id);

        return view('itens.show', compact('item', 'personagem'));
    }
}
