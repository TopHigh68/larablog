<x-app-layout>
    {{-- Messages flash --}}
    @if (session('success'))
    <div class="bg-green-500 text-white p-4 w-[60%] mx-auto rounded-lg mt-6 mb-6 text-center">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-500 text-white p-4 w-[60%] mx-auto rounded-lg mt-6 mb-6 text-center">
        {{ session('error') }}
    </div>
    @endif

    {{-- Grille responsive des articles --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6 max-w-7xl mx-auto">
        @forelse ($articles as $article)
        <div
            class="rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow
                {{ $article->draft ? 'bg-yellow-100 border-l-4 border-yellow-500 dark:bg-yellow-900' : 'bg-white dark:bg-gray-800' }}">

            <div class="p-6 flex flex-col justify-between h-full">
                <div>
                    @if ($article->draft)
                    <span class="inline-block bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded mb-2">
                        Brouillon
                    </span>
                    @endif

                    {{-- Titre --}}
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $article->title }}
                    </h3>
                    {{-- Catégories --}}
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($article->categories as $category)
                        <span
                            class="text-xs font-semibold px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full">
                            {{ $category->name }}
                        </span>
                        @endforeach
                    </div>

                    {{-- Contenu réduit --}}
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        {{ Str::limit(strip_tags($article->content), 100) }}
                    </p>



                    {{-- Date de publication --}}
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Publié le {{ $article->created_at->format('d M Y à H:i') }}
                    </p>
                </div>

                {{-- Boutons actions --}}
                <div class="flex justify-end mt-4 space-x-2">
                    <a href="{{ route('articles.edit', $article->id) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        Modifier
                    </a>
                    <button onclick="confirmDelete('{{ route('articles.remove', $article->id) }}')"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-600 dark:text-gray-300">
            Aucun article disponible.
        </div>
        @endforelse
    </div>
</x-app-layout>
<script>
    function confirmDelete(url) {
        if (confirm("Es-tu sûr de vouloir supprimer cet article ?")) {
            window.location.href = url;
        }
    }
</script>