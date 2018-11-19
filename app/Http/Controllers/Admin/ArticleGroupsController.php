<?php

namespace App\Http\Controllers\Admin;

use App\ArticleGroup;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticleGroupsController extends Controller
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
        // $articlegroups = ArticleGroup::all();
        $sortable_type = 'articleGroup';
        $unsorted_groups = ArticleGroup::all();
        $groupIds = $unsorted_groups->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $groupIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_groups->sortByIds($order->toArray());

            $ags = $ordered->values()->toArray();

            $articlegroups = array_map(function($array){
                return (object)$array;
            }, $ags);
        } else {
            $articlegroups = ArticleGroup::all();
        }

        // return $articlegroups;

        return view('admin.articlegroup.index', compact('articlegroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.articlegroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enter into db
        $articlegroup = new ArticleGroup();

        $articlegroup->title = request('title');

        $articlegroup->description = request('description');

        $articlegroup->save();

        return redirect('admin/articlegroups')->with('status', 'New Article Group Created!');
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

        // Get Entry
        $articlegroup = ArticleGroup::find($id);

        return view('admin.articlegroup.edit', compact('articlegroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Update DB
        // Return to list
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
        \App\ArticleGroup::destroy($id);

        return redirect('admin/articlegroups');
    }

}
