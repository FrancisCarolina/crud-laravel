<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nome' => 'required|max:255',
                'descricao' => 'required|max:255',
            ]);

            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('sucesso', 'Categoria cadastrada com sucesso!');
            
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('erro', 'Erro ao cadastrar a categoria. Tente novamente.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            
            return redirect()->route('categorias.index')->with('sucesso', 'Categoria excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('erro', 'Erro ao excluir a categoria. Tente novamente.');
        }
    }
}
