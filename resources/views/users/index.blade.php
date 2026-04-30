@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Usuaris</h1>
    <a href="{{ route('users.create') }}" class="bg-green-700 text-white px-4 py-2 rounded">+ Nou usuari</a>
</div>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="px-4 py-3 text-left">Nom</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Rol</th>
                <th class="px-4 py-3 text-left">Accions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($users as $user)
            <tr>
                <td class="px-4 py-3">{{ $user->name }}</td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded text-xs {{ $user->rol === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                        {{ $user->rol }}
                    </span>
                </td>
                <td class="px-4 py-3 flex gap-2">
                    <a href="{{ route('users.edit', $user) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Segur?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
