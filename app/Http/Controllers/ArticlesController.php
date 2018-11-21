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
            $articles = \App\Article::where('published', 1)->orderBy('id', 'desc')->get();
            // $articles = \App\Article::articles();
        } else {
            $category = \App\ArticleGroup::findOrFail($id);
            $articles = \App\Article::where([
                ['group_id', '=', $id],
                ['published', '=', '1'],
            ])->paginate(10);
        }

        return view('articles.index', compact('articles', 'category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // return $article;
        // $article = \App\Article::findOrFail($id);
        $tags = $article->tags;

        $category = \App\ArticleGroup::findOrFail($article->group_id);

        return view('articles.show', compact('article', 'category', 'tags'));
    }

}
