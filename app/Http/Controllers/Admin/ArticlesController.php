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
        // $categories = \App\ArticleGroup::all();
        $categories = \App\ArticleGroup::articlegroups();
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
        $library = true;

        return view('admin.articles.create', compact('categories','library'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Store Request Data
        $article = Article::create([
            'user_id'       => \Auth::id(),
            'title'         => request('title'),
            'author'        => request('author'),
            'publication'   => request('publication'),
            'date'          => request('date'),
            'page'          => request('page'),
            'introduction'   => request('introduction'),
            'description'   => request('description'),
            'image'         => request('image'),
            'link'          => request('link'),
            'pdf'           => request('pdf'),
            'group_id'      => request('group_id'),
        ]);

        // Attach Tags
        if (request('tags')) {
            foreach (request('tags') as $tag) {
                if (!\App\Tag::exists($tag)) {
                    $tag = \App\Tag::create(['name' => $tag]);
                }
                $article->tags()->attach($tag);
            }
        }

        // return $request;
        return redirect('admin/articles')->with('status', 'Article created!');
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
        $library = true;

        return view('admin.articles.edit', compact('categories', 'article', 'tags','library'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Store Request Data
        Article::where('id', $id)
                ->update([
                    'user_id'       => \Auth::id(),
                    'title'         => request('title'),
                    'author'        => request('author'),
                    'publication'   => request('publication'),
                    'date'          => request('date'),
                    'page'          => request('page'),
                    'introduction'   => request('introduction'),
                    'description'   => request('description'),
                    'image'         => request('image'),
                    'link'          => request('link'),
                    'pdf'           => request('pdf'),
                    'group_id'      => request('group_id'),
                ]);

        $article = \App\Article::find($id);

        $syncTags = [];

        // Attach Tags
        if (request('tags')) {
            foreach (request('tags') as $tag) {
                if (!\App\Tag::exists($tag)) {
                    $tag = \App\Tag::addNew($tag);
                }

                $t = (int)$tag;
                array_push($syncTags, $t);
            }

            // return $syncTags;
            $article->tags()->sync($syncTags);

        } else {
            // Detach All Tags
            $oldTags = $article->tags()->pluck('id');
            // return $oldTags;
            $article->tags()->detach($oldTags);
        }

        // return $request;
        return redirect('admin/articles')->with('status', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Article::destroy($id);

        return redirect('admin/articles');
    }

    public function publish($id)
    {
        \App\Article::publish($id);

        return back()->with('status', 'Article published!');
    }

}
