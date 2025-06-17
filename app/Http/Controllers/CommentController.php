<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Valider les données du formulaire
        $validated = $request->validate([
            'content' => 'required|string|min:2|max:1000',
            'article_id' => 'required|exists:articles,id',
        ]);

        // Création du commentaire
        Comment::create([
            'content' => $validated['content'],
            'article_id' => $validated['article_id'],
            'user_id' => Auth::id()
        ]);

        // Redirige vers l'article commenté
        return redirect()->route('public.show', [
            'user' => Article::findOrFail($validated['article_id'])->user_id,
            'article' => $validated['article_id'],
        ])->with('success', 'Commentaire ajouté avec succès !');
    }
}
