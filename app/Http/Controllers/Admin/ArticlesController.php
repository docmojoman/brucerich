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
        $this->validate($request, [
            'title'         => 'required'
        ]);

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
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                // $tagHasId returns id if numeric else id[0] if alpha
                // $tagHasId returns false if doen't exist
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId) {
                    if (\App\Tag::taggedAlready($tagHasId, $article->id, 'article')->count() <= 0) {
                        $article->tags()->attach($tagHasId);
                    }
                } else {
                    $newTag = \App\Tag::create(['name' => $tag]);
                    $article->tags()->attach($newTag->id);
                }
            }
        }

        // Attach Tags
        // if (request('tags')) {
        //     foreach (request('tags') as $tag) {
        //         if (!\App\Tag::exists($tag)) {
        //             $tag = \App\Tag::create(['name' => $tag]);
        //         }
        //         $article->tags()->attach($tag);
        //     }
        // }

        // return $request;
        return redirect('admin/articles')->with('status', 'Article created!');
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

        return view('admin.articles.show', compact('article', 'category', 'tags', 'pages'));
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

        return view('admin.articles.edit', compact('categories', 'article', 'tags'));
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
                // $tagHasId returns id if numeric else id[0] if alpha
                // $tagHasId returns false if doen't exist
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId === false) {
                    $tagHasId = \App\Tag::addNew($tag);
                }

                // Convert $tagHasId to numeric
                if (is_array($tagHasId)) {
                    $bk = $tagHasId[0];
                } else {
                    $bk = $tagHasId;
                }
                // Check to see if relationship exists
                // $bk = (int)$tag;
                array_push($syncTags, $bk);
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
        return back()->with('status', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unlink = \App\Article::find($id);

        $unlink->tags()->detach();

        \App\Article::destroy($id);

        return redirect('admin/articles');
    }

    public function publish($id)
    {
        \App\Article::publish($id);

        return back()->with('status', 'Article published!');
    }

}
