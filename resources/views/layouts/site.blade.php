<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Ellas') }}</title>

        <!-- Importando CSS e JS (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Fontes e Ícones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="font-sans antialiased bg-ellas-dark text-white selection:bg-ellas-pink selection:text-white overflow-x-hidden flex flex-col min-h-screen">

        <!-- 1. Menu de Navegação (Fixo no topo) -->
        <!-- O Laravel vai buscar esse arquivo em: resources/views/components/site/navbar.blade.php -->
        @include('components.site.navbar')

        <!-- 2. Conteúdo da Página -->
        <!-- Aqui é onde o conteúdo da Home, Sobre, etc. será injetado -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- 3. Rodapé -->
        <!-- O Laravel vai buscar esse arquivo em: resources/views/components/site/footer.blade.php -->
        @include('components.site.footer')

    </body>
</html>