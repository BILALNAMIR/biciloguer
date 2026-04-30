<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Categoria::withCount('bicicletes')->get();
        return view('categories.index', compact('categories'));
    }

    public function show(Categoria $categoria)
    {
        $categoria->load('bicicletes');
        return view('categories.show', compact('categoria'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'        => 'required|max:100',
            'descripcio' => 'nullable',
        ]);
        Categoria::create($request->only('nom', 'descripcio'));
        return redirect()->route('categories.index')->with('success', 'Categoria creada.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categories.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nom'        => 'required|max:100',
            'descripcio' => 'nullable',
        ]);
        $categoria->update($request->only('nom', 'descripcio'));
        return redirect()->route('categories.index')->with('success', 'Categoria actualitzada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria eliminada.');
    }
}
