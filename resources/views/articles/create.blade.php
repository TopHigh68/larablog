<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Créer un article
        </h2>
    </x-slot>

    <form method="post" action="{{ route('articles.store') }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden dark:bg-slate-950 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                   <!-- Input de titre de l'article -->
                   <input type="text" name="title" id="title" placeholder="Titre de l'article" class="w-full placeholder:text-white rounded-md dark:bg-slate-500 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="p-6 pt-0 text-gray-900 dark:text-white ">
                   <!-- Contenu de l'article -->
                   <textarea rows="10" name="content" id="content" placeholder="Contenu de l'article" class="w-full placeholder:text-white rounded-md border-gray-300 shadow-sm dark:bg-slate-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div class="p-6 text-gray-900 dark:text-white flex items-center ">
                    <!-- Action sur le formulaire -->
                    <div class="grow">
                        <input type="checkbox" name="draft" id="draft" class="rounded-md mr-2 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label for="draft">Article en brouillon</label>
                    </div>
                    <div>
                        <button type="submit" class=" hover:bg-blue-700  text-white bg-blue-700  font-bold py-2 px-5 rounded">
                            Créer l'article
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>