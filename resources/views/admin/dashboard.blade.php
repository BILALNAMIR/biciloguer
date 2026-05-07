@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Panell d'administració</h1>
    <p class="text-gray-600 text-sm mt-1">Resum general de l'aplicació.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-4">
        <p class="text-sm text-gray-500 mb-1">Bicicletes totals</p>
        <p class="text-2xl font-bold text-green-700">{{ $totalBicicletes }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-4">
    <h2 class="font-semibold mb-2">Enllaços ràpids</h2>
    <div class="flex flex-wrap gap-2 text-sm">
        <a href="{{ route('bicicletes.index') }}" class="px-3 py-1 rounded bg-green-50 text-green-700">Bicicletes</a>
        <a href="{{ route('categories.index') }}" class="px-3 py-1 rounded bg-blue-50 text-blue-700">Categories</a>
        <a href="{{ route('lloguers.index') }}" class="px-3 py-1 rounded bg-purple-50 text-purple-700">Lloguers</a>
        <a href="{{ route('users.index') }}" class="px-3 py-1 rounded bg-gray-100 text-gray-700">Usuaris</a>
    </div>
</div>
@endsection
