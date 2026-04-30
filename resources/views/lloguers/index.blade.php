@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">
        {{ auth()->user()->isAdmin() ? 'Tots els lloguers' : 'Els meus lloguers' }}
    </h1>
    <a href="{{ route('lloguers.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">+ Nou lloguer</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                @if(auth()->user()->isAdmin()) <th class="px-4 py-3 text-left">Usuari</th> @endif
                <th class="px-4 py-3 text-left">Bicicleta</th>
                <th class="px-4 py-3 text-left">Inici</th>
                <th class="px-4 py-3 text-left">Fi</th>
                <th class="px-4 py-3 text-left">Total</th>
                <th class="px-4 py-3 text-left">Accions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($lloguers as $lloguer)
            <tr>
                @if(auth()->user()->isAdmin()) <td class="px-4 py-3">{{ $lloguer->user->name }}</td> @endif
                <td class="px-4 py-3">{{ $lloguer->bicicleta->nom }}</td>
                <td class="px-4 py-3">{{ $lloguer->data_inici }}</td>
                <td class="px-4 py-3">{{ $lloguer->data_fi }}</td>
                <td class="px-4 py-3 font-bold text-green-700">{{ $lloguer->preu_total }} €</td>
                <td class="px-4 py-3 flex gap-2">
                    <a href="{{ route('lloguers.show', $lloguer) }}" class="text-blue-600 hover:underline">Veure</a>
                    <form method="POST" action="{{ route('lloguers.destroy', $lloguer) }}" onsubmit="return confirm('Segur?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-6 text-center text-gray-400">No hi ha lloguers.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
