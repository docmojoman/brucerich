<?php

namespace App\Http\Controllers\Admin;

use App\Insight;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class InsightsController extends Controller
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
    public function index()
    {
        // $insights = \App\Insight::all()->sortByDesc('id');
        $sortable_type = 'insight';
        $unsorted_insights = Insight::all();
        $insightIds = $unsorted_insights->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $insightIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_insights->sortByIds($order->toArray());

            $insts = $ordered->values()->toArray();

            $insights = array_map(function($array){
                return (object)$array;
            }, $insts);
        } else {
            $insights = Insight::all();
        }

        return view('admin.insights.index', compact('insights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.insights.create');
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
        $insight = Insight::create([
            'user_id'       => \Auth::id(),
            'title'         => request('title'),
            'author'        => request('author'),
            'introduction'   => request('introduction'),
            'description'   => request('description'),
            'copy'          => request('copy'),
        ]);

        // Attach Tags
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId) {
                    if (\App\Tag::taggedAlready($tagHasId, $insight->id, 'insight')->count() <= 0) {
                        $insight->tags()->attach($tagHasId);
                    }
                } else {
                    $newTag = \App\Tag::create(['name' => $tag]);
                    $insight->tags()->attach($newTag->id);
                }
            }
        }

        // Attach Tags
        // if (request('tags')) {
        //     foreach (request('tags') as $tag) {
        //         if (!\App\Tag::exists($tag)) {
        //             $tag = \App\Tag::create(['name' => $tag]);
        //         }
        //         $insight->tags()->attach($tag);
        //     }
        // }

        // return $request;
        return redirect('admin/insights')->with('status', 'Insight created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function show(Insight $insight)
    {
        // $insight = \App\Insight::find($id);
        $tags = $insight->tags;

        return view('admin.insights.show', compact('insight', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insight = \App\Insight::find($id);

        $tags = $insight->tags;

        $library = true;

        return view('admin.insights.edit', compact('insight', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Store Request Data
        Insight::where('id', $id)
                ->update([
                    'user_id'       => \Auth::id(),
                    'title'         => request('title'),
                    'author'        => request('author'),
                    'introduction'   => request('introduction'),
                    'description'   => request('description'),
                    'copy'   => request('copy'),
                ]);

        $insight = \App\Insight::find($id);

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
            $insight->tags()->sync($syncTags);

        } else {
            // Detach All Tags
            $oldTags = $insight->tags()->pluck('id');
            // return $oldTags;
            $insight->tags()->detach($oldTags);
        }

        // return $request;
        return back()->with('status', 'Insights Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unlink = \App\Insight::find($id);

        $unlink->tags()->detach();

        \App\Insight::destroy($id);

        return redirect('admin/insights');
    }

    public function publish($id)
    {
        \App\Insight::publish($id);

        return back();
    }

}
