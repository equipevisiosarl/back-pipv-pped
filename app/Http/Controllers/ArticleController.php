<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
       $articles = Article::paginate(10);
       $breadcrumbs = [
        "active" => "Articles",
        []
    ];
       return view('articles', compact('articles', 'breadcrumbs'));
    }

    public function article($id){
        $article = Article::where('id', $id)->first();
        $breadcrumbs = [
            "active" => $article->title,
            ['articles' => "Articles"]
        ];
        return view('composants.article.article', compact('article', 'breadcrumbs'));
    }
}
