<?php

namespace App\Http\Controllers\Admin;

use App\Book;

use App\Section;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
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
    public function index($id)
    {
        $sortable_type = 'section';
        $unsorted_sections = Section::where('book_id', $id)->get();
        $sectionIds = $unsorted_sections->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $sectionIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_sections->sortByIds($order->toArray());

            $bks = $ordered->values()->toArray();

            $sections = array_map(function($array){
                return (object)$array;
            }, $bks);
        } else {
            $sections = Section::where('book_id', $id)->get();
        }

        // Redirect
        $book_id = $id;

        // dd($sections);
        return view('admin.sections.index', compact('sections', 'book_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sortable = \App\Section::find($id);
        // dd($sortable);

        DB::table('sortables')->where([
                    ['sortable_id', $id],
                    ['sortable_type', 'section']
                ])->delete();

        \App\Section::destroy($id);

        return back()->with('status', 'Section deleted!');
    }

}
