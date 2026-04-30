@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Editar: {{ $categoria->nom }}</h1>
    <form method="POST" action="{{ route('categories.update', $categoria) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $categoria->nom) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Descripció</label>
            <textarea name="descripcio" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcio', $categoria->descripcio) }}</textarea>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded w-full">Actualitzar</button>
    </form>
</div>
@endsection
