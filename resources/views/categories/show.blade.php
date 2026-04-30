@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-2">{{ $categoria->nom }}</h1>
<p class="text-gray-500 mb-6">{{ $categoria->descripcio }}</p>
<h2 class="text-lg font-semibold mb-4">Bicicletes en aquesta categoria</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @forelse($categoria->bicicletes as $bicicleta)
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-semibold">{{ $bicicleta->nom }}</h3>
        <p class="text-green-700">{{ $bicicleta->preu_dia }} €/dia</p>
        <a href="{{ route('bicicletes.show', $bicicleta) }}" class="text-blue-600 text-sm hover:underline">Veure</a>
    </div>
    @empty
        <p class="text-gray-400">Cap bicicleta en aquesta categoria.</p>
    @endforelse
</div>
<a href="{{ route('categories.index') }}" class="mt-6 inline-block text-gray-600 hover:underline">← Tornar</a>
@endsection
