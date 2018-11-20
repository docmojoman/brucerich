<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
	public function index()
	{
    	$videos = \App\Video::videos();

        return view('media', compact('videos'));
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        // $video = \App\Video::find($slug);
        $tags = $video->tags;
        // return $video;

        return view('video', compact('video', 'tags'));
    }

}
