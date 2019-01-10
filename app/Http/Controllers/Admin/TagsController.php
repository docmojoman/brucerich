<?php

namespace App\Http\Controllers\Admin;

use App\Tag;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TagsController extends Controller
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
        // $tags = \App\Tag::all()->orderByRaw('LOWER(name) DESC');

        $tags = DB::table('tags')->select('*')->orderByRaw('LOWER(name)')->get();

        return view('admin.tags.index', compact('tags'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }


        $tags = \App\Tag::where('name', 'like', "$term%")->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name'         => 'required'
        ]);

        // Store Request Data
        $tag = \App\Tag::create([
            'name'         => request('name')
        ]);

        return redirect('admin/tags')->with('status', 'Tag created!');
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
        $tag = \App\Tag::find($id);

        return view('admin.tags.edit', compact('tag'));
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
        $tag = \App\Tag::find(request('id'));

        $existingTag = \App\Tag::where('name', request('name'))->first();

        // echo '<pre>';
        // echo $tag->id;
        // echo '<br /><br />';
        // echo $existingTag->id;
        // echo '</pre>';
        // die();

        if ($existingTag != null && $existingTag->id != $tag->id) {
            return back()->with('status', 'Tag "'.request('name').'" Already Exists!');
        }

        $tag->name = request('name');

        $tag->slug = str_slug(request('name'));

        $tag->save();

        return redirect('admin/tags')->with('status', 'Tag Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tag = \App\Tag::find($id);

        // Remove relationships
        // \App\Taggable::destroyRelationships($id);
        if (DB::table('taggables')->where('tag_id', '=', $id)->delete()) {

            \App\Tag::destroy($id);

        } else {

            \App\Tag::destroy($id);

        }

        return redirect('admin/tags')->with('status', 'Tag Deleted!');
    }
}
