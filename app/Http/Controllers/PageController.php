<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        $insights = \App\Insight::insights();

        $home = true;

    	return view('index', compact('insights', 'home'));
    }

    public function about()
    {
        $about = \App\About::first();

    	return view('about', compact('about'));
    }

    public function media()
    {
    	return view('media');
    }

    public function info()
    {
        return view('info');
    }

}
