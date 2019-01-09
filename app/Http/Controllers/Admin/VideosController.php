<?php

namespace App\Http\Controllers\Admin;

use App\Video;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VideosController extends Controller
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
        // $videos = \App\Video::all();

        $sortable_type = 'video';
        $unsorted_videos = Video::all();
        $videoIds = $unsorted_videos->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $videoIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_videos->sortByIds($order->toArray());

            $vid = $ordered->values()->toArray();

            $videos = array_map(function($array){
                return (object)$array;
            }, $vid);
        } else {
            $videos = Video::all();
        }

        // dd($videos);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $library = true;

        return view('admin.videos.create');
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
        $video = Video::create([
            'user_id'           => \Auth::id(),
            'title'             => request('title'),
            'embed'             => request('embed'),
            'thumbnail'         => request('thumbnail'),
            'caption'           => request('caption'),
        ]);

        // Attach Tags
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId) {
                    if (\App\Tag::taggedAlready($tagHasId, $video->id, 'video')->count() <= 0) {
                        $video->tags()->attach($tagHasId);
                    }
                } else {
                    $newTag = \App\Tag::create(['name' => $tag]);
                    $video->tags()->attach($newTag->id);
                }
            }
        }

        // Attach Tags
        // foreach (request('tags') as $tag) {
        //     if (!\App\Tag::exists($tag)) {
        //         $tag = \App\Tag::create(['name' => $tag]);
        //     }
        //     $video->tags()->attach($tag);
        // }

        // return $request;
        return redirect('admin/videos')->with('status', 'Video created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        // $video = \App\Video::find($slug);
        $tags = $video->tags;
        // return $video;

        return view('admin.videos.show', compact('video', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = \App\Video::find($id);

        $tags = $video->tags;

        $library = true;

        return view('admin.videos.edit', compact('video', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Store Request Data
        Video::where('id', $id)
                ->update([
                    'user_id'           => \Auth::id(),
                    'title'             => request('title'),
                    'embed'             => request('embed'),
                    'thumbnail'         => request('thumbnail'),
                    'caption'           => request('caption'),
                ]);

        $video = \App\Video::find($id);

        $syncTags = [];

        // Attach Tags
        if (request('tags')) {
            foreach (request('tags') as $tag) {
                if (!\App\Tag::exists($tag)) {
                    $tag = \App\Tag::addNew($tag);
                }

                $vid = (int)$tag;
                array_push($syncTags, $vid);
            }

            // return $syncTags;
            $video->tags()->sync($syncTags);

        } else {
            // Detach All Tags
            $oldTags = $video->tags()->pluck('id');
            // return $oldTags;
            $video->tags()->detach($oldTags);
        }

        // return $request;
        return redirect('admin/videos')->with('status', 'Video updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unlink = \App\Video::find($id);

        $unlink->tags()->detach();

        \App\Video::destroy($id);

        return redirect('admin/videos');
    }

    public function publish($id)
    {
        \App\Video::publish($id);

        return back();
    }

}
