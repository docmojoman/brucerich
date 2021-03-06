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
            // $articles = \App\Article::where('published', 1)->orderBy('id', 'desc')->paginate(10);
            $sections = \App\ArticleGroup::articlegroups();

            return view('articles.main', compact('sections'));

        } else {
            $category = \App\ArticleGroup::findOrFail($id);
            // $articles = \App\Article::where([
            //     ['group_id', '=', $id],
            //     ['published', '=', '1'],
            // ])->paginate(10);

            $articles = \App\Article::articles($id);
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
        $tags = $article->tags->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $category = \App\ArticleGroup::findOrFail($article->group_id);

        // Get prev and next articles
        // get articles in group list
        $list = Article::pubd()->category($article->group_id)->get();
        // cast to Array
        $l_array = $list->toArray();

        // Get Key
        $key = array_search($article->id, array_column($l_array, 'id'));
        $prev = $key - 1;
        $next = $key + 1;

        // return $key;
        // $is_admin = ($user['permissions'] == 'admin') ? true : false;

        // if $prev is a negative value $prev = null
        // if $next is greater than $key - 1, $next = null
        if ($prev >= 0) {
            $pages['prev']['slug'] = $list[$prev]['slug'];
            $pages['prev']['title'] = $list[$prev]['title'];
        } else {
            $pages['prev'] = null;
        }

        if ($next <= (count($list) - 1)) {
            $pages['next']['slug'] = $list[$next]['slug'];
            $pages['next']['title'] = $list[$next]['title'];
        } else {
            $pages['next'] = null;
        }

        // return $pages;

        return view('articles.show', compact('article', 'category', 'tags', 'pages'));
    }

}
