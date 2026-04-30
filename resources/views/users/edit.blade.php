@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Editar: {{ $user->name }}</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nom</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Rol</label>
            <select name="rol" class="w-full border rounded px-3 py-2">
                <option value="user" {{ $user->rol === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded w-full">Actualitzar</button>
    </form>
</div>
@endsection
