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
        $insights = \App\Insight::all()->sortByDesc('id');

        // dd($insights);
        return view('admin.insights.index', compact('insights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.insights.create');
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
        $insight = Insight::create([
            'user_id'       => \Auth::id(),
            'title'         => request('title'),
            'author'        => request('author'),
            'description'   => request('description'),
            'copy'          => request('copy'),
        ]);

        // Attach Tags
        foreach (request('tags') as $tag) {
            if (!\App\Tag::exists($tag)) {
                $tag = \App\Tag::addNew($tag);
            }
            $insight->tags()->attach($tag);
        }

        // return $request;
        return redirect('admin/insights')->with('status', 'Insight created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function show(Insights $insights)
    {
        //
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
                    'description'   => request('description'),
                    'copy'   => request('copy'),
                ]);

        $insight = \App\Insight::find($id);

        $syncTags = [];

        // Attach Tags
        foreach (request('tags') as $tag) {
            if (!\App\Tag::exists($tag)) {
                $tag = \App\Tag::addNew($tag);
            }

            $t = (int)$tag;
            array_push($syncTags, $t);
        }

        // return $syncTags;
        $insight->tags()->sync($syncTags);

        // return $request;
        return redirect('admin/insights')->with('status', 'Insights Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Insight::destroy($id);

        return redirect('admin/insights');
    }

    public function publish($id)
    {
        \App\Insight::publish($id);

        return back();
    }

}
