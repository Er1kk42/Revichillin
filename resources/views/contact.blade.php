<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kontakt - Revichillin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-black text-white min-h-screen">

<header class="w-full bg-slate-800 rounded-bl-[10px] rounded-br-[10px]">
    <div class="max-w-8xl mx-auto px-6">
        <nav class="relative flex flex-col sm:flex-row items-center sm:justify-between h-auto sm:h-20 py-4 sm:py-0">
            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-5 mb-3 sm:mb-0 w-full sm:w-auto text-center sm:text-left justify-center">
                <a href="{{ route('produkty') }}" class="px-4 py-2 rounded text-white transition duration-150 transform hover:scale-105 hover:text-yellow-400">Produkty</a>
                <a href="{{ route('info') }}" class="px-4 py-2 rounded text-white transition duration-150 transform hover:scale-105 hover:text-yellow-400">Info</a>
                <a href="{{ route('contact') }}" class="px-4 py-2 rounded text-white transition duration-150 transform hover:scale-105 hover:text-yellow-400">kontakt</a>
                @auth
                    @if(auth()->user()->role === 'admin') <a href="{{ route('admin.users') }}" class="px-4 py-2 text-sm text-green-300 transition duration-150 transform hover:scale-125 hover:text-yellow-400"> Používatelia </a>
                    @endif
                @endauth
            </div>

            <a href="{{ route('start') }}"
               class="group mx-auto sm:absolute sm:left-1/2 sm:transform sm:-translate-x-1/2 z-50 sm:top-0.5 pointer-events-auto">
                <img src="{{ asset('image/Revichillin.png') }}"
                     alt="Revichillin"
                     class="h-16 sm:h-20 transition-transform duration-200 transform group-hover:scale-135 pointer-events-auto" />
            </a>

            <div class="flex flex-col sm:flex-row items-center gap-3 mt-3 sm:mt-0 w-full sm:w-auto justify-center">
                <form action="#" method="GET" class="flex w-full sm:w-auto">
                    <label for="search" class="sr-only">Hladat</label>
                    <input id="search" name="q" type="search" class="w-full sm:w-56 px-3 py-2 bg-slate-700 placeholder-slate-300 text-white rounded-l-md focus:outline-none focus:ring-2 focus:ring-slate-600" placeholder="Search...">
                    <button type="submit" class="px-3 py-2 bg-slate-600 rounded-r-md text-white transition duration-150 transform hover:scale-105 hover:text-slate-200" aria-label="search">🔍</button>
                </form>

                @auth
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="flex items-center gap-2 px-4 py-2 rounded bg-yellow-400 text-white transition duration-150 transform hover:bg-red-500 hover:scale-105"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor"><path d="M3 10a1 1 0 011-1h8a1 1 0 110 2H4a1 1 0 01-1-1z" /><path d="M13 5l4 5-4 5V5z" /></svg><span>Logout</span></button></form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="group flex items-center gap-2 px-4 py-2 rounded text-white transition duration-150 transform hover:scale-105"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current text-white group-hover:text-yellow-400 transition-colors" viewBox="0 0 20 20" ><path fill-rule="evenodd" d="M10 12a4 4 0 100-8 4 4 0 000 8zm-7 6a7 7 0 0114 0H3z" clip-rule="evenodd" /></svg><span class="transition-colors group-hover:text-yellow-400">Login</span></a>
                @endguest
            </div>
        </nav>
    </div>
</header>

<main class="w-full flex justify-center px-4 py-8">
    <div class="w-full max-w-[1200px]">
        <h1 class="text-3xl font-semibold mb-4">Tu bude kontakt</h1>
        <p class="text-slate-300">Kontaktné informácie a formulár pre kontakt tu budú neskôr pridané.</p>
    </div>
</main>

</body>
</html>
