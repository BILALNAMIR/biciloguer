<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiciLloguer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-green-700">🚲 BiciLloguer</a>
            <div class="flex gap-4 text-sm items-center">
                <a href="{{ route('bicicletes.index') }}" class="text-gray-700 hover:text-green-700">Bicicletes</a>
                <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-green-700">Categories</a>
                @auth
                    <a href="{{ route('lloguers.index') }}" class="text-gray-700 hover:text-green-700">Els meus lloguers</a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-green-700">Usuaris</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-500 hover:underline">Sortir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-700">Login</a>
                    <a href="{{ route('register') }}" class="bg-green-700 text-white px-3 py-1 rounded">Registra't</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
