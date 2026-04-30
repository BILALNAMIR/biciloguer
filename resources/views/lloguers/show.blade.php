@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Detall del lloguer</h1>
    <p class="mb-2"><span class="font-medium">Bicicleta:</span> {{ $lloguer->bicicleta->nom }}</p>
    <p class="mb-2"><span class="font-medium">Usuari:</span> {{ $lloguer->user->name }}</p>
    <p class="mb-2"><span class="font-medium">Data inici:</span> {{ $lloguer->data_inici }}</p>
    <p class="mb-2"><span class="font-medium">Data fi:</span> {{ $lloguer->data_fi }}</p>
    <p class="mb-4"><span class="font-medium">Preu total:</span> <span class="text-green-700 font-bold">{{ $lloguer->preu_total }} €</span></p>
    <a href="{{ route('lloguers.index') }}" class="text-gray-600 hover:underline">← Tornar</a>
</div>
@endsection
