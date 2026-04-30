@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Editar: {{ $bicicleta->nom }}</h1>
    <form method="POST" action="{{ route('bicicletes.update', $bicicleta) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $bicicleta->nom) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Descripció</label>
            <textarea name="descripcio" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcio', $bicicleta->descripcio) }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Preu per dia (€)</label>
            <input type="number" name="preu_dia" value="{{ old('preu_dia', $bicicleta->preu_dia) }}" step="0.01" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="disponible" value="1" {{ old('disponible', $bicicleta->disponible) ? 'checked' : '' }}>
                <span class="text-sm font-medium">Disponible</span>
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nova imatge (opcional)</label>
            <input type="file" name="imatge" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Categories</label>
            <div class="flex flex-wrap gap-2">
                @foreach($categories as $cat)
                    <label class="flex items-center gap-1 text-sm">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}"
                            {{ in_array($cat->id, $categoriesSeleccionades) ? 'checked' : '' }}>
                        {{ $cat->nom }}
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded w-full">Actualitzar</button>
    </form>
</div>
@endsection
