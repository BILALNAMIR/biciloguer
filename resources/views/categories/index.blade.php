@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Categories</h1>
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('categories.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">+ Nova categoria</a>
    @endif
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($categories as $categoria)
    <div class="bg-white rounded-lg shadow p-4">
        <h3 class="font-semibold text-lg mb-1">{{ $categoria->nom }}</h3>
        <p class="text-gray-500 text-sm mb-2">{{ $categoria->descripcio }}</p>
        <p class="text-xs text-gray-400 mb-3">{{ $categoria->bicicletes_count }} bicicletes</p>
        <div class="flex gap-2 text-sm">
            <a href="{{ route('categories.show', $categoria) }}" class="text-blue-600 hover:underline">Veure</a>
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('categories.edit', $categoria) }}" class="text-yellow-600 hover:underline">Editar</a>
                <form method="POST" action="{{ route('categories.destroy', $categoria) }}" onsubmit="return confirm('Segur?')">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline">Eliminar</button>
                </form>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
