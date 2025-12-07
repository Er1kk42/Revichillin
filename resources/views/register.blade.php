<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registrácia</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="bg-black min-h-screen text-gray-200 flex justify-center">

<a href="{{ route('start') }}" class="fixed left-1/2  transform -translate-x-1/2 z-60 flex items-center justify-center" aria-label="Domov">
    <img src="{{ asset('image/Revichillin.png') }}" alt="Revichillin" class="h-20 transition duration-200 transform hover:scale-145" />
</a>

<!-- Main wrapper: place content directly below the fixed logo -->
<main class="w-full flex justify-center p-6 mt-24">
    <!-- Center card with registration form (similar style to login) -->
    <div class="w-full max-w-[550px] h-auto sm:h-[600px] bg-gray-700 rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row items-stretch">

        <!-- Right: registration form fills center on small screens too -->
        <div class="w-full sm:w-full p-8 flex items-center">
            <div class="w-full">
                <h2 class="text-2xl centerfont-semibold mb-4">Registrácia</h2>
                <p class="text-sm text-gray-300 mb-6">Vytvorte si účet zadaním mena, e-mailu a hesla.</p>

                <form id="registerForm" method="POST" action="{{ route('register.post') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm mb-1">Meno</label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}" class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                        @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm mb-1">E-mail</label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}" class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                        @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm mb-1">Heslo</label>
                        <input id="password" name="password" type="password" required class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                        @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm mb-1">Potvrďte heslo</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full px-4 py-2 bg-gray-600 text-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-gray-500" />
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full px-5 py-3 bg-indigo-600 text-white rounded transform transition duration-150 hover:scale-105">Registrovať</button>
                    </div>
                </form>
                <script>
                    if (typeof window !== 'undefined' && window.FormValidate && window.FormValidate.attachValidation) {
                        window.FormValidate.attachValidation('#registerForm');
                    }
                </script>

             </div>
         </div>
     </div>
</main>

 </body>
 </html>
