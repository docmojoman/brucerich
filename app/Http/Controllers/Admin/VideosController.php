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

            $bks = $ordered->values()->toArray();

            $videos = array_map(function($array){
                return (object)$array;
            }, $bks);
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
        //
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
        //
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $videos)
    {
        //
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

        return view('admin.videos.edit', compact('video', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $videos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Videos  $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $videos)
    {
        //
    }
}
