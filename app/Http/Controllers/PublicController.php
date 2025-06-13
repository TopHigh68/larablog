<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   public function index(User $user)
    {
        // On récupère les articles publiés de l'utilisateur
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->get();

        // On retourne la vue
        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }
    public function show(User $user, Article $article)
    {
        // $user est l'utilisateur de l'article
         if ($article->draft !== 0 || $article->user_id !== $user->id) {
        abort(404); // Ou rediriger vers une page d'erreur / accueil
        }
        // $article est l'article à afficher
         return view('public.show', [
        'article' => $article,
        'user' => $user
        ]);

        // Je vous laisse faire le code
        // N'oubliez pas de vérifier que l'article est publié (draft == 0)
    }
}
