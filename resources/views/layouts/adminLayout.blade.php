<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonte do Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Fonte Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- Fonte Figtree -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    {{-- JS --}}
    <script src="{{ asset('js/deleteAdmin.js') }}"></script>^
    <script src=" {{ asset('js/showItems.js') }}"></script>

    @vite('resources/css/app.css')

    <title>@yield('title')</title>
</head>

<body class="font-sans bg-gray-100">
    <div class="fixed top-0 bottom-0 left-0 p-4 text-white bg-[#1D374E] shadow-md w-72">
        <div class="flex items-center mb-8">
            <img src="{{ asset('imgs/1144760.png') }}" alt="Logo" class="w-12 h-12 mr-4">
            <h1 class="text-lg font-semibold">Bem-vindo Admin</h1>
        </div>
        <nav>
            <ul class="space-y-3">
                <li>
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleList('vinhos')">
                        <h2 class="text-sm font-semibold">Vinhos</h2>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-gray-300 transition-transform duration-300 transform"
                            viewBox="0 0 20 20" fill="currentColor" id="arrow-vinhos">
                            <path fill-rule="evenodd"
                                d="M10 16a1 1 0 01-.707-.293l-4-4a1 1 0 011.414-1.414L10 13.586l3.293-3.293a1 1 0 111.414 1.414l-4 4A1 1 0 0110 16z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <ul class="hidden ml-6 space-y-1 list-none" id="vinhos">
                        <li><a href="#" class="text-gray-300 hover:text-gray-100">Loureiro</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-gray-100">Arinto</a></li>
                    </ul>
                </li>
                <li>
                    <div class="flex items-center justify-between cursor-pointer" onclick="toggleList('utilizadores')">
                        <h2 class="text-sm font-semibold">Utilizadores</h2>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-gray-300 transition-transform duration-300 transform"
                            viewBox="0 0 20 20" fill="currentColor" id="arrow-utilizadores">
                            <path fill-rule="evenodd"
                                d="M10 16a1 1 0 01-.707-.293l-4-4a1 1 0 011.414-1.414L10 13.586l3.293-3.293a1 1 0 111.414 1.414l-4 4A1 1 0 0110 16z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <ul class="hidden ml-6 space-y-1 list-none" id="utilizadores">
                        <li><a href="#" class="text-gray-300 hover:text-gray-100">Administradores</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-gray-100">Clientes</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <main class="p-4 ml-72">
        @yield('content')
    </main>
</body>

</html>
