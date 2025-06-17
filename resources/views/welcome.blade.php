<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MonBlog') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] font-sans min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-lg font-bold text-gray-900 dark:text-white">
                        {{-- {{ config('app.name', 'Mon Blog') }} --}}
                        Mon Blog
                    </a>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <div class="max-w-7xl mx-auto flex items-center justify-between">
                        @if (Route::has('login'))
                        <nav class="flex items-center gap-4">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Dashboard</a>
                            @else
                            <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Connexion</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Inscription</a>
                            @endif
                            @endauth
                        </nav>
                        @endif
                    </div>
                </nav>
                <!-- Menu mobile -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-600 dark:text-gray-300 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menu mobile dropdown -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <a href="#" class="block py-2 text-gray-700 dark:text-gray-300">Accueil</a>
            <a href="#" class="block py-2 text-gray-700 dark:text-gray-300">À propos</a>
            <a href="#" class="block py-2 text-gray-700 dark:text-gray-300">Contact</a>
        </div>
    </header>

    <!-- Hero / Introduction -->
    <section class="px-6 py-16 text-center bg-white dark:bg-[#131313] border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Bienvenue sur <span class="text-blue-600">MonBlog</span></h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">{{-- Lisez, découvrez et suivez les histoires de nos auteurs
                passionnés. --}} Découvrez les articles qui ont été ajouter par nos auteurs</p>
        </div>
    </section>

    
    <!-- Derniers articles -->
    <section class="px-6 py-12 bg-gray-50 dark:bg-[#0a0a0a] flex-1">
        <p>Cette Partie n'est pas encore implémenté</p>
    </section>

    <!-- Footer -->
    <footer
        class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 py-10 mt-16 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Logo et description -->
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ config('app.name', 'MonBlog') }}
                    </h2>
                    <p class="text-sm">Une plateforme pour découvrir, lire et suivre vos auteurs préférés.</p>
                </div>

                <!-- Liens de navigation -->
                <div>
                    <h3 class="text-md font-semibold mb-2">Navigation</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#" class="hover:text-blue-500">Accueil</a></li>
                        <li><a href="#" class="hover:text-blue-500">Tous les articles</a></li>
                        <li><a href="#" class="hover:text-blue-500">Nos auteurs</a></li>
                        <li><a href="#" class="hover:text-blue-500">Contact</a></li>
                    </ul>
                </div>

                <!-- Réseaux sociaux -->
                <div>
                    <h3 class="text-md font-semibold mb-2">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-blue-500" aria-label="Facebook">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-2.9h2V9.6c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2v1.5h2.3l-.4 2.9h-1.9v7A10 10 0 0 0 22 12z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-blue-500" aria-label="Twitter">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M8 19c7.5 0 11.6-6.2 11.6-11.6v-.5A8.3 8.3 0 0 0 22 4.5a8.1 8.1 0 0 1-2.3.6 4.1 4.1 0 0 0 1.8-2.3 8.2 8.2 0 0 1-2.6 1A4.1 4.1 0 0 0 16.1 3a4.1 4.1 0 0 0-4.1 4.1c0 .3 0 .7.1 1A11.6 11.6 0 0 1 3 4.5a4.1 4.1 0 0 0 1.3 5.4A4.1 4.1 0 0 1 3 9.1v.1a4.1 4.1 0 0 0 3.3 4 4.1 4.1 0 0 1-1.9.1 4.1 4.1 0 0 0 3.8 2.8A8.3 8.3 0 0 1 2 18.6a11.6 11.6 0 0 0 6 1.8" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-blue-500" aria-label="Instagram">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M7 2C4.8 2 3 3.8 3 6v12c0 2.2 1.8 4 4 4h10c2.2 0 4-1.8 4-4V6c0-2.2-1.8-4-4-4H7zm10 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-2.8a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bas du footer -->
            <div class="mt-8 text-center text-xs text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
            </div>
        </div>
    </footer>

</body>

</html>