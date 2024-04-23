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
<body>
    <div class="fixed top-0 bottom-0 left-0 w-72 p-4 bg-[#1D374E]">
        <div class="text-center">
            <p class="text-[#ffffff]">Bem vindo Admin</p>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
</body>
</html>l