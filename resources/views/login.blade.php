<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Prihlásenie</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-black min-h-screen text-gray-200">


<!-- Centered top logo (links to start) -->
<a href="{{ route('start') }}" class="fixed left-1/2  transform -translate-x-1/2 z-60 flex items-center justify-center" aria-label="Domov">
    <img src="{{ asset('image/Revichillin.png') }}" alt="Revichillin" class="h-20 transition duration-200 transform hover:scale-145" />
</a>

<!-- Top navbar (full width) -->


<!-- Main: centered window with left image placeholder and right login form -->
<main class="min-h-[calc(100vh-60px)] flex items-center justify-center p-6">
    <!-- Card: target ~750px width x 900px height on larger screens; mobile falls back to auto height -->
    <div class="w-full max-w-[750px] h-auto sm:h-[500px] bg-gray-700 rounded-lg overflow-hidden flex flex-col sm:flex-row items-stretch">
        <!-- left: full image -->
        <div class="w-full sm:w-1/2 h-full">
            <img
                src="{{ asset('image/pppp.png') }}"
                alt="Ilustračný obrázok"
                class="w-full h-full object-cover"
            >
        </div>


        <!-- right: login form -->
        <div class="w-full sm:w-1/2 p-8 flex items-center h-full">
            <div class="w-full">
                <h2 class="text-2xl font-semibold mb-4">Prihlásenie</h2>
                <p class="text-sm text-gray-300 mb-6">Prihláste sa pomocou vášho e-mailu a hesla.</p>

                <form id="loginForm" method="POST" action="#" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm mb-1">E-mail</label>
                        <input id="email" name="email" type="email" required class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm mb-1">Heslo</label>
                        <input id="password" name="password" type="password" required class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded transform transition duration-150 hover:scale-105">Prihlásiť</button>
                        <a href="{{ route('register') }}" class="text-sm text-gray-300 hover:text-white">Registrovať sa</a>
                    </div>
                </form>
                <!-- kontrola, ze subor validate je uz nacitany -->
                <script>
                    if (typeof window !== 'undefined' && window.FormValidate && window.FormValidate.attachValidation) {
                        window.FormValidate.attachValidation('#loginForm');
                    }
                </script>

             </div>
         </div>
     </div>
 </main>

 </body>
 </html>
