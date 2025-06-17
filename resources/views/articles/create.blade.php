<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Créer un article
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('articles.store') }}" class="py-12">
        @csrf
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-950 shadow-md rounded-lg p-6 space-y-6">

                <!-- Titre de l'article -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Titre de l'article
                    </label>
                    <input type="text" name="title" id="title" placeholder="Titre de l'article"
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

                <!-- Contenu de l'article -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Contenu
                    </label>
                    <textarea name="content" id="content" rows="10" placeholder="Contenu de l'article"
                        class="w-full px-4 py-2 rounded-md dark:bg-slate-700 dark:text-white border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Brouillon + Bouton -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="draft" id="draft"
                            class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-slate-700 text-blue-600 focus:ring-blue-500">
                        <label for="draft" class="text-sm text-gray-700 dark:text-gray-300">Mettre l'article en brouillon</label>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow-md transition duration-200">
                        Créer l'article
                    </button>
                </div>

            </div>
        </div>
    </form>
</x-app-layout>
