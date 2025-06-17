<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
 {
    public function index( User $user )
    {
        // On récupère les articles publiés de l'utilisateur
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->get();

        // On retourne la vue
        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }
   public function show(User $user, $article_id)
    {
        $article = Article::where('id', $article_id)
            ->where('user_id', $user->id)
            ->where('draft', 0)
            ->firstOrFail();

        return view('public.show', [
            'article' => $article,
            'user' => $user
        ]);
    }

}
