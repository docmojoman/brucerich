<?php

namespace App\Http\Controllers\Admin;

use App\Article;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Protected for Admin.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $selectedGroup = $id;
        $sortable_type = 'article';

        if ($id == null) {
            $sort = false; // toggle sorting off
            $articles = \App\Article::all();
            $order = null;
        } else {
            $sort = true;
            $unsorted_articles = \App\Article::where('group_id', $id)->get();
            $groupIds = $unsorted_articles->pluck('id');
            $order = \App\Sort::groupOrder($sortable_type, $groupIds)->pluck('sortable_id');

            // Use SortableCollection Class
            $ordered = $unsorted_articles->sortByIds($order->toArray());

            $arts = $ordered->values()->toArray();

            $articles = array_map(function($array){
                return (object)$array;
            }, $arts);
        }
        $categories = \App\ArticleGroup::all();
        // return $articles;

        return view('admin.articles.index', compact('articles', 'categories', 'selectedGroup', 'sort'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\ArticleGroup::all();

        return view('admin.articles.create', compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store Request Data

        // Attach New Record to Soratable

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = \App\ArticleGroup::all();
        $article = \App\Article::find($id);
        $tags = $article->tags;

        return view('admin.articles.edit', compact('categories', 'article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
