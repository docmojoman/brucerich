<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Protected for Admin.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Check to see if About page has data
        $about = \App\About::first();

    	return view('admin.dashboard', compact('about'));
    }
}
