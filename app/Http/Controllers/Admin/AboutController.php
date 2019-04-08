<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Protected for Admin.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'introduction'         => 'required'
        ]);

        // Store Request Data
        $about = \App\About::create([
            'introduction'    => request('introduction'),
            'content'         => request('content')
        ]);

        return redirect('admin/about')->with('status', 'About content created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = \App\About::first();
    	// dd($about);
        return view('admin.about.edit', compact('about'));
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
    	$about = \App\About::first();

        if ($about == null) {
        	$about = new \App\About;
        }

        $about->introduction = request('introduction');

        $about->content = request('content');

        $about->save();

        // return view('admin.about.edit')->with('status', 'About content Updated!');
        return redirect('admin/about/edit')->with('status', 'About content Updated!');
    }

}
