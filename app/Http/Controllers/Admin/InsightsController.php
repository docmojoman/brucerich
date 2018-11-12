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
    public function store(Request $request)
    {
        //
        return $request;
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
    public function update(Request $request, Insights $insights)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insights  $insights
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insights $insights)
    {
        //
    }
}
