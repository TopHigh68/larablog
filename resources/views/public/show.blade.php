<x-guest-layout>
    <div class="max-w-3xl mx-auto px-10 py-8  bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">

        <!-- Titre de l'article -->
        <h1 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white mb-2">
            {{ $article->title }}
        </h1>

        <!-- Catégories -->
        <div class="flex flex-wrap justify-center gap-2 mb-4">
            @foreach ($article->categories as $category)
                <span class="text-xs font-semibold px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full shadow-sm">
                    {{ $category->name }}
                </span>
            @endforeach
        </div>

        <!-- Auteur et date -->
        <div class="flex justify-center items-center text-sm text-gray-600 dark:text-gray-400 mb-6">
            <span>
                Publié le {{ $article->created_at->format('d/m/Y') }} par
                <a href="{{ route('public.index', $article->user->id) }}"
                    class="text-red-600 dark:text-red-400 hover:underline">
                    {{ $article->user->name }}
                </a>
            </span>
        </div>

        <!-- Contenu de l'article -->
        <article class="prose dark:prose-invert max-w-none dark:text-white text-center">
            {!! nl2br(e($article->content)) !!}
        </article>

        <!-- Commentaires -->
        <div class="mt-12">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Commentaires</h2>

            @forelse ($article->comments as $comment)
                <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded">
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        {{ $comment->content }}
                    </p>
                    <div class="text-xs text-gray-500 mt-2">
                        Par <span class="font-semibold">{{ $comment->user->name }}</span>,
                        le {{ $comment->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">Aucun commentaire pour le moment.</p>
            @endforelse
        </div>

        <!-- Formulaire d'ajout de commentaire -->
        <div class="mt-10">
            @auth
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('comments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ajouter un commentaire</label>
                        <textarea id="content" name="content" rows="4" required
                            class="w-full p-3 border rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-700"
                            placeholder="Votre commentaire ici...">{{ old('content') }}</textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-800 transition">
                            Envoyer
                        </button>
                    </div>
                </form>
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-red-600 hover:underline">Connectez-vous</a> pour laisser un commentaire.
                </p>
            @endauth
        </div>

        <!-- Bouton retour -->
        <div class="mt-8 text-center">
            <a href="{{ route('public.index', $article->user->id) }}"
                class="inline-block px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 rounded hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                ← Retour aux articles
            </a>
        </div>
    </div>
</x-guest-layout>
