@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Nova Bicicleta</h1>
    <form method="POST" action="{{ route('bicicletes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border rounded px-3 py-2" required>
            @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Descripció</label>
            <textarea name="descripcio" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcio') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Preu per dia (€)</label>
            <input type="number" name="preu_dia" value="{{ old('preu_dia') }}" step="0.01" class="w-full border rounded px-3 py-2" required>
            @error('preu_dia') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="disponible" value="1" {{ old('disponible', true) ? 'checked' : '' }}>
                <span class="text-sm font-medium">Disponible</span>
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Imatge</label>
            <input type="file" name="imatge" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Categories</label>
            <div class="flex flex-wrap gap-2">
                @foreach($categories as $cat)
                    <label class="flex items-center gap-1 text-sm">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}">
                        {{ $cat->nom }}
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded w-full">Crear bicicleta</button>
    </form>
</div>
@endsection
