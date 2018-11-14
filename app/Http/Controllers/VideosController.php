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
}
