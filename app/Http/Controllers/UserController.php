<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class UserController extends Controller
 {
    public function create()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'content', 'draft']);
        
        $request->validate([
            'title' => 'required|string|unique:articles,title',
            'content' => 'required|string',
        ], [
            'title.unique' => 'Un article avec ce titre existe déjà.',
            'title.required' => 'Le titre est requis.',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['draft'] = isset($data['draft']) ? 1 : 0;

        $article = Article::create($data);

        // Ajout des catégories
        if ($request->has('categories')) {
            $article->categories()->sync($request->input('categories'));
        }

        return redirect()->route('dashboard')->with('success', 'Article créé avec succès !');
    }

    public function index()
    {
        // On récupère l'utilisateur connecté.
        $user = Auth::user();
        $articles = Article::where( 'user_id', $user->id )
        ->orderBy( 'created_at', 'desc' )
        ->get();

        // On retourne la vue.
        // return view( 'dashboard', [] );

        return view( 'dashboard', [
            'articles' => $articles
        ] );
    }

    public function edit(Article $article)
    {
        if ($article->user_id !== Auth::user()->id) {
            abort(403);
        }

        $categories = Category::all(); // Toutes les catégories

        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }


    public function update(Request $request, Article $article)
    {
        if ($article->user_id !== Auth::user()->id) {
            abort(403);
        }

        $data = $request->only(['title', 'content', 'draft']);
        $data['draft'] = isset($data['draft']) ? 1 : 0;

        $article->update($data);

        // Mise à jour des catégories
        if ($request->has('categories')) {
            $article->categories()->sync($request->input('categories'));
        }

        return redirect()->route('dashboard')->with('success', 'Article mis à jour !');
    }


    public function remove (Request $request, Article $article ) 
    {
        // On vérifie que l'utilisateur est bien le créateur de l'article
        if ( $article->user_id !== Auth::user()->id ) {
            abort( 403 );
            return redirect()->route( 'dashboard' )->with( 'error', 'Vous ne pouvez mettre a jour cet article!' );
        }
        // Supprime les relations avec les catégories
        $article->categories()->detach();
        // // On recherche l'article que l'on veux rechercher
        // $article = Article::find( $id );
        // fonction pour pouvoir supprimer la fonction
        $article->delete();
        return redirect()->route('dashboard')->with('success', 'Article supprimer avec succès!' );

    }
}
