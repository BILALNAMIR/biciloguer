@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Nova Categoria</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nom</label>
            <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border rounded px-3 py-2" required>
            @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Descripció</label>
            <textarea name="descripcio" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcio') }}</textarea>
        </div>
        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded w-full">Crear categoria</button>
    </form>
</div>
@endsection
