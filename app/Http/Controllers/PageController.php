<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $insights = \App\Insight::where('published', 1)
            ->latest()->get();

            // dd($insights);

    	return view('index', compact('insights'));
    }

    public function about()
    {
    	return view('about');
    }

    public function media()
    {
    	return view('media');
    }

    public function contact()
    {
    	return view('contact');
    }

}
