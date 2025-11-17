<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Mostrar lista de categorias.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Formulário de criação.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Salvar nova categoria.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        Categoria::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('categorias.index')
                         ->with('sucesso', 'Categoria criada com sucesso!');
    }

    /**
     * Formulário de edição.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualizar categoria no banco.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update(['nome' => $request->nome]);

        return redirect()->route('categorias.index')
                         ->with('sucesso', 'Categoria atualizada com sucesso!');
    }

    /**
     * Excluir categoria.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')
                         ->with('sucesso', 'Categoria excluída com sucesso!');
    }
}
