<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;
use App\Models\Categoria;
use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    public function index()
    {
        $bicicletes = Bicicleta::with('categories')->get();
        return view('bicicletes.index', compact('bicicletes'));
    }

    public function show(Bicicleta $bicicleta)
    {
        $bicicleta->load('categories');
        return view('bicicletes.show', compact('bicicleta'));
    }

    public function create()
    {
        $categories = Categoria::all();
        return view('bicicletes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'        => 'required|max:100',
            'descripcio' => 'nullable',
            'preu_dia'   => 'required|numeric|min:1',
            'disponible' => 'boolean',
            'imatge'     => 'nullable|image|max:2048',
            'categories' => 'nullable|array',
        ]);

        if ($request->hasFile('imatge')) {
            $data['imatge'] = $request->file('imatge')->store('bicicletes', 'public');
        }

        $data['disponible'] = $request->boolean('disponible');
        $bicicleta = Bicicleta::create($data);
        $bicicleta->categories()->sync($request->categories ?? []);

        return redirect()->route('bicicletes.index')->with('success', 'Bicicleta creada correctament.');
    }

    public function edit(Bicicleta $bicicleta)
    {
        $categories = Categoria::all();
        $categoriesSeleccionades = $bicicleta->categories->pluck('id')->toArray();
        return view('bicicletes.edit', compact('bicicleta', 'categories', 'categoriesSeleccionades'));
    }

    public function update(Request $request, Bicicleta $bicicleta)
    {
        $data = $request->validate([
            'nom'        => 'required|max:100',
            'descripcio' => 'nullable',
            'preu_dia'   => 'required|numeric|min:1',
            'disponible' => 'boolean',
            'imatge'     => 'nullable|image|max:2048',
            'categories' => 'nullable|array',
        ]);

        if ($request->hasFile('imatge')) {
            $data['imatge'] = $request->file('imatge')->store('bicicletes', 'public');
        }

        $data['disponible'] = $request->boolean('disponible');
        $bicicleta->update($data);
        $bicicleta->categories()->sync($request->categories ?? []);

        return redirect()->route('bicicletes.index')->with('success', 'Bicicleta actualitzada.');
    }

    public function destroy(Bicicleta $bicicleta)
    {
        $bicicleta->delete();
        return redirect()->route('bicicletes.index')->with('success', 'Bicicleta eliminada.');
    }
}
