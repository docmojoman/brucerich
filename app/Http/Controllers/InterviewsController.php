<?php

namespace App\Http\Controllers;

use App\Interview;

use Illuminate\Http\Request;

class InterviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        $interviews = \App\Interview::interviews();

        return view('interviews.index', compact('interviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        // return $interview;
        // $interview = \App\Interview::findOrFail($id);
        $tags = $interview->tags->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        // Get prev and next interviews
        // get interviews in group list
        $list = Interview::pubd()->get();
        // cast to Array
        $l_array = $list->toArray();

        // Get Key
        $key = array_search($interview->id, array_column($l_array, 'id'));
        $prev = $key - 1;
        $next = $key + 1;

        // return $key;
        // $is_admin = ($user['permissions'] == 'admin') ? true : false;

        // if $prev is a negative value $prev = null
        // if $next is greater than $key - 1, $next = null
        if ($prev >= 0) {
            $pages['prev']['slug'] = $list[$prev]['slug'];
            $pages['prev']['title'] = $list[$prev]['title'];
        } else {
            $pages['prev'] = null;
        }

        if ($next <= (count($list) - 1)) {
            $pages['next']['slug'] = $list[$next]['slug'];
            $pages['next']['title'] = $list[$next]['title'];
        } else {
            $pages['next'] = null;
        }

        // return $pages;

        return view('interviews.show', compact('interview', 'category', 'tags', 'pages'));
    }

}
