@extends('layouts.app')
@section('content')
<div class="text-center py-10">
    <h1 class="text-4xl font-bold text-green-700 mb-2">Benvingut a BiciLloguer 🚲</h1>
    <p class="text-gray-500 mb-8">Lloga la teva bicicleta ideal al millor preu</p>
    <a href="{{ route('bicicletes.index') }}" class="bg-green-700 text-white px-6 py-2 rounded-lg">Veure bicicletes</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
    @foreach($bicicletes as $bicicleta)
    <div class="bg-white rounded-lg shadow p-4">
        @if($bicicleta->imatge)
            <img src="{{ asset('storage/'.$bicicleta->imatge) }}" class="w-full h-40 object-cover rounded mb-3">
        @else
            <div class="w-full h-40 bg-green-50 flex items-center justify-center rounded mb-3 text-4xl">🚲</div>
        @endif
        <h3 class="font-semibold text-lg">{{ $bicicleta->nom }}</h3>
        <p class="text-green-700 font-bold">{{ $bicicleta->preu_dia }} €/dia</p>
        <a href="{{ route('bicicletes.show', $bicicleta) }}" class="text-sm text-blue-600 hover:underline">Veure detall</a>
    </div>
    @endforeach
</div>
@endsection
