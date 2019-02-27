<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insight;

class InsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insights = \App\Insight::where('published', 1)
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        $relatedInsights =  \App\Tag::relatedGroupTags('insight', $insights->pluck('id'));

        $allTags = array_values(array_unique(array_collapse([
            $relatedInsights,
        ])));

        $tags = \App\Tag::all()->whereIn('id', $allTags)->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        return view('insights.index', compact('insights', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Insight $insight)
    {
        // $insight = \App\Insight::find($id);
        $tags = $insight->tags->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        return view('insights.show', compact('insight', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

}
