@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Nou Lloguer</h1>
    <form method="POST" action="{{ route('lloguers.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Bicicleta</label>
            <select name="bicicleta_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Selecciona --</option>
                @foreach($bicicletes as $bici)
                    <option value="{{ $bici->id }}" {{ request('bicicleta') == $bici->id ? 'selected' : '' }}>
                        {{ $bici->nom }} – {{ $bici->preu_dia }} €/dia
                    </option>
                @endforeach
            </select>
            @error('bicicleta_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Data inici</label>
            <input type="date" name="data_inici" value="{{ old('data_inici') }}" class="w-full border rounded px-3 py-2" required>
            @error('data_inici') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Data fi</label>
            <input type="date" name="data_fi" value="{{ old('data_fi') }}" class="w-full border rounded px-3 py-2" required>
            @error('data_fi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded w-full">Confirmar lloguer</button>
    </form>
</div>
@endsection
