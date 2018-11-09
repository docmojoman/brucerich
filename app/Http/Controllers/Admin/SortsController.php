<?php

namespace App\Http\Controllers\Admin;

use App\Sort;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class SortsController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sortable_type)
    {
        // dd($sortable_type);
        $order = Sort::order($sortable_type);

        return $order->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        /*
            format request for storage
            wherein ids are represented in db ->
            if not already in db, add
        */
        $sortable_type = $request->sortable_type;
        $i = 0;
        foreach ($request->positions as $data) {
            $updates[$i] = [
                'sortable_id' => $data[0],
                'sort_id' => $data[1]
            ];
            $order[$i++] =  $data[0];
        }

        // foreach if id is in array
        foreach ($updates as $update) {
            if(!in_array($update['sortable_id'], $order)) {
            // add new
            $sortable = Sort::type($sortable_type);
            $sortable->find($update['sortable_id'])->position()->attach($update['sort_id']);
            } else {
            // update
            $sortable = Sort::type($sortable_type);
            $sortable->find($update['sortable_id'])->position()->sync($update['sort_id']);
            }

        }

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortable($sortable_type)
    {
        // do this
    }
}
