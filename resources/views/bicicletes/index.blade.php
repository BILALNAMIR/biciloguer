@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Bicicletes</h1>
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('bicicletes.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">+ Nova bicicleta</a>
    @endif
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($bicicletes as $bicicleta)
    <div class="bg-white rounded-lg shadow p-4">
        @if($bicicleta->imatge)
            <img src="{{ asset('storage/'.$bicicleta->imatge) }}" class="w-full h-40 object-cover rounded mb-3">
        @else
            <div class="w-full h-40 bg-green-50 flex items-center justify-center rounded mb-3 text-4xl">🚲</div>
        @endif
        <h3 class="font-semibold text-lg">{{ $bicicleta->nom }}</h3>
        <p class="text-gray-500 text-sm mb-1">{{ $bicicleta->categories->pluck('nom')->join(', ') }}</p>
        <p class="text-green-700 font-bold mb-2">{{ $bicicleta->preu_dia }} €/dia</p>
        <span class="text-xs px-2 py-1 rounded {{ $bicicleta->disponible ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ $bicicleta->disponible ? 'Disponible' : 'No disponible' }}
        </span>
        <div class="mt-3 flex gap-2 text-sm">
            <a href="{{ route('bicicletes.show', $bicicleta) }}" class="text-blue-600 hover:underline">Veure</a>
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('bicicletes.edit', $bicicleta) }}" class="text-yellow-600 hover:underline">Editar</a>
                <form method="POST" action="{{ route('bicicletes.destroy', $bicicleta) }}" onsubmit="return confirm('Segur?')">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline">Eliminar</button>
                </form>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
