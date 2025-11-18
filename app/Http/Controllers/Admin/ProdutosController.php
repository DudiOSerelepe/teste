<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::with('categorias')->get();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Produtos::create($request->all());

        return redirect()->route('admin.produtos.index')
                         ->with('sucesso', 'Produto criado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produtos::findOrFail($id);
        $categorias = Categorias::all();

        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $produto = Produtos::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('admin.produtos.index')
                         ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->delete();

        return redirect()->route('admin.produtos.index')
                         ->with('sucesso', 'Produto excluído com sucesso!');
    }
}
