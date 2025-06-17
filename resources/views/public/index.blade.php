<x-guest-layout>
    <div class="max-w-9xl mx-auto px-4 py-8">
        <!-- Titre de la page -->
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-10">
            Articles publiés par {{ $user->name }}
        </h2>

        <!-- Grille des articles -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @forelse ($articles as $article)
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md hover:shadow-lg transition duration-300 p-6 flex flex-col justify-between">
                    <!-- Titre -->
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $article->title }}
                    </h3>

                    <!-- Contenu -->
                    <p class="text-gray-700 dark:text-gray-300 text-sm mb-3">
                        {{ Str::limit(strip_tags($article->content), 100, '...') }}
                    </p>

                    <!-- Catégories -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($article->categories as $category)
                            <span
                                class="text-xs font-semibold px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Lien -->
                    <a href="{{ route('public.show', [$article->user_id, $article->id]) }}"
                        class="mt-auto inline-block text-red-600 dark:text-red-400 hover:underline font-medium">
                        Lire la suite →
                    </a>
                </div>
            @empty
                <p class="text-center col-span-full text-gray-600 dark:text-gray-400">
                    Aucun article publié pour le moment.
                </p>
            @endforelse
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-10 flex justify-center">
            {{ $articles->links() }}
        </div> --}}
    </div>
</x-guest-layout>
