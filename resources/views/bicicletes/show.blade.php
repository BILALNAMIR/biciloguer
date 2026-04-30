@extends('layouts.app')
@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    @if($bicicleta->imatge)
        <img src="{{ asset('storage/'.$bicicleta->imatge) }}" class="w-full h-60 object-cover rounded mb-4">
    @else
        <div class="w-full h-60 bg-green-50 flex items-center justify-center rounded mb-4 text-6xl">🚲</div>
    @endif
    <h1 class="text-2xl font-bold mb-2">{{ $bicicleta->nom }}</h1>
    <p class="text-gray-600 mb-3">{{ $bicicleta->descripcio }}</p>
    <p class="text-green-700 font-bold text-xl mb-2">{{ $bicicleta->preu_dia }} €/dia</p>
    <p class="text-sm mb-2">Categories: <span class="font-medium">{{ $bicicleta->categories->pluck('nom')->join(', ') ?: 'Cap' }}</span></p>
    <span class="text-xs px-2 py-1 rounded {{ $bicicleta->disponible ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
        {{ $bicicleta->disponible ? 'Disponible' : 'No disponible' }}
    </span>
    <div class="mt-6 flex gap-3">
        @auth
            @if($bicicleta->disponible)
                <a href="{{ route('lloguers.create') }}?bicicleta={{ $bicicleta->id }}" class="bg-green-700 text-white px-4 py-2 rounded">Llogar</a>
            @endif
        @endauth
        <a href="{{ route('bicicletes.index') }}" class="text-gray-600 hover:underline">← Tornar</a>
    </div>
</div>
@endsection
