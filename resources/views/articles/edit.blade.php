<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-white leading-tight text-center">
            Modifier l'article : {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 p-6 rounded shadow">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-8 space-y-6">
                <form method="POST" action="{{ route('articles.update', $article->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Titre -->
                    <div>
                       <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Titre de l'article
                    </label>
                        <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}"
                            required
                           class="w-full px-4 py-2 rounded-md dark:bg-slate-700 dark:text-white border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                <!-- Catégories avec checkboxes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Catégories
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($categories as $category)
                            <label class="inline-flex items-center space-x-2 bg-slate-100 dark:bg-slate-800 px-3 py-2 rounded shadow-sm">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                                    class="text-blue-600 rounded focus:ring-blue-500 dark:bg-slate-700 dark:border-gray-600">
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                    <!-- Contenu -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Contenu</label>
                        <textarea id="content" name="content" rows="10"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Contenu de l'article...">{{ old('content', $article->content) }}</textarea>
                    </div>

                    <!-- Brouillon + Bouton -->
                    <div class="flex items-center justify-between mt-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="draft" id="draft"
                                {{ $article->draft ? 'checked' : '' }}
                                class="accent-blue-600 h-4 w-4 rounded focus:ring-2 focus:ring-blue-500">
                            <span class="ml-2 text-gray-700 dark:text-gray-300">Article en brouillon</span>
                        </label>

                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
