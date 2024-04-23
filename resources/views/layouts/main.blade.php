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

    @vite('resources/css/app.css')
    
    <title>@yield('title')</title>
</head>
<body class="bg-[#FAF5E1]">
    <header class="static flex items-center justify-between py-4 mx-auto border-b max-w-7xl">
        <div>
            <a href="/" class="text-[#E0CD67] text-3xl">Vinhos do Galo</a>
        </div>
        <div class="text-center">
            <ul class="flex space-x-4">
                <li>
                    <a href="/" class="text-base text-black hover:text-[#E0CD67]">Home</a>
                </li>
                <li>
                    <a href="#" class="text-base text-black">Sobre nós</a>
                </li>
                <li>
                    <a href="/vinhos" class="text-base text-black">Vinhos</a>
                </li>
                <li>
                    <a href="#" class="text-base text-black">Promoções</a>
                </li>
            </ul>
        </div>
        <div>
            @auth
                <a href="/adicionar-produto" class="text-lg hover:text-[#AE1442]">Adicionar Produto</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-lg hover:text-[#AE1442]">Logout</button>
                </form>
            @endauth
            
            @guest
                <a href="{{ route('login')}}" class="bg-[#E0CD67] w-20 h-12 rounded-lg text-white flex items-center justify-center hover:bg-pink-950 text-center">Login</a>
            @endguest
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="py-4 mt-auto bg-[#232323]">
        <div class="container mx-auto text-center text-white">
            <p>Laravel &copy; 2024</p>
        </div>
    </footer>
</body>
</html>
