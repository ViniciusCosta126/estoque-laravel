<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <title>{{ $title }}</title>
</head>

<body class="bg-gray-light">
    @vite('resources/js/app.js')

    <nav class="bg-blue p-4 flex items-center justify-between">
        <div>
            <h1 class="text-white text-xl font-semibold">Controle de estoque</h1>
        </div>
        {{-- <div class="flex items-center space-x-4">
            <span class="text-white">Bem vindo</span>
            <i class="fas fa-user-circle text-white text-2xl"></i>
        </div> --}}
    </nav>
    <!-- Navegación lateral -->
    <div class="flex h-screen">
        <x-sidebar.sidebar />
        <main class=" p-4 ">
            <h1 class="text-4xl font-bold uppercase mb-4">{{ $page }}</h1>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
