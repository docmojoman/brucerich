<?php

namespace App\Http\Controllers\Admin;

use App\Interview;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class InterviewsController extends Controller
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
        // $interviews = \App\Interview::all()->sortByDesc('id');
        $sortable_type = 'interview';
        $unsorted_interviews = Interview::all();
        $interviewIds = $unsorted_interviews->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $interviewIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_interviews->sortByIds($order->toArray());

            $intrvw = $ordered->values()->toArray();

            $interviews = array_map(function($array){
                return (object)$array;
            }, $intrvw);
        } else {
            $interviews = Interview::all();
        }

        return view('admin.interviews.index', compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.interviews.create');
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
        $interview = Interview::create([
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
        ]);

        // Attach Tags
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId) {
                    if (\App\Tag::taggedAlready($tagHasId, $interview->id, 'interview')->count() <= 0) {
                        $interview->tags()->attach($tagHasId);
                    }
                } else {
                    $newTag = \App\Tag::create(['name' => $tag]);
                    $interview->tags()->attach($newTag->id);
                }
            }
        }

        return redirect('admin/interviews')->with('status', 'Insight created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function show(Insight $interview)
    {
        // $interview = \App\Interview::find($id);
        $tags = $interview->tags;

        return view('admin.interviews.show', compact('interview', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interview = \App\Interview::find($id);

        $tags = $interview->tags;

        return view('admin.interviews.edit', compact('interview', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Store Request Data
        Interview::where('id', $id)
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
                ]);

        $interview = \App\Interview::find($id);

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
            $interview->tags()->sync($syncTags);

        } else {
            // Detach All Tags
            $oldTags = $interview->tags()->pluck('id');
            // return $oldTags;
            $interview->tags()->detach($oldTags);
        }

        // return $request;
        return back()->with('status', 'Interview updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interviews  $interviews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unlink = \App\Interview::find($id);

        $unlink->tags()->detach();

        \App\Interview::destroy($id);

        return redirect('admin/interviews');
    }

    public function publish($id)
    {
        $status = \App\Interview::publish($id);

        return back()->with(compact('status'));
    }

}
