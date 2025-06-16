<x-guest-layout>
    <div class="max-w-3xl mx-auto  px-4 py-8">
        <!-- Titre -->
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4 text-center">
            {{ $article->title }}
        </h1>

        <!-- Auteur et date -->
        <div class="flex justify-center items-center text-sm text-gray-600 dark:text-gray-400 mb-6">
            <span>
                Publié le {{ $article->created_at->format('d/m/Y') }} par
                <a href="{{ route('public.index', $article->user->id) }}" class="text-red-600 dark:text-red-400 hover:underline">
                    {{ $article->user->name }}
                </a>
            </span>
        </div>

        <!-- Contenu de l'article -->
        <article class="prose dark:prose-invert max-w-none  dark:text-white text-center">
            {!! nl2br(e($article->content)) !!}
        </article>

        <!-- Bouton retour -->
        <div class="mt-8 text-center">
            <a href="{{ route('public.index', $article->user->id) }}"
               class="inline-block px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 rounded hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                ← Retour aux articles
            </a>
        </div>
    </div>
</x-guest-layout>
