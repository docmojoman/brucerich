<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        if ($id == null) {
            $articles = \App\Article::where('published', 1)->get();
        } else {
            $category = \App\ArticleGroup::find($id);
            $articles = \App\Article::where([
                ['group_id', '=', $id],
                ['published', '=', '1'],
            ])->get();
        }

        return view('articles.index', compact('articles', 'category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = \App\Article::find($id);
        // dd($article);

        $category = \App\ArticleGroup::find($article->group_id);

        return view('articles.show', compact('article', 'category'));
    }

}
