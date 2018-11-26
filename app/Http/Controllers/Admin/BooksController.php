<?php

namespace App\Http\Controllers\Admin;

use App\Book;

use App\Section;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BooksController extends Controller
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
        $sortable_type = 'book';
        $unsorted_books = Book::all();
        $bookIds = $unsorted_books->pluck('id');
        $order = \App\Sort::groupOrder($sortable_type, $bookIds)->pluck('sortable_id');

        if ($order != null) {
            // Use SortableCollection Class
            $ordered = $unsorted_books->sortByIds($order->toArray());

            $bks = $ordered->values()->toArray();

            $books = array_map(function($array){
                return (object)$array;
            }, $bks);
        } else {
            $books = Book::all();
        }

        // dd($books);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = \App\Book::create([
            'user_id'       => \Auth::id(),
            'title'         => $request->title,
            'publisher'     => $request->publisher,
            'image'         => $request->image,
            'alt_tags'      => $request->alt_tags,
            'amazon'        => $request->amazon,
            'introduction'  => $request->introduction,
            'about'         => $request->about,
        ]);

        // Check for dynamic sections $initial ?: 'default'
        if ($request->section) {
            // $i = 0;
            foreach ($request->section as $section) {
                $caption = isset($section['caption']) ? $section['caption'][0] : '';
                $description = isset($section['description']) ? $section['description'][0] : '';
                $embed = isset($section['embed']) ? $section['embed'][0] : '';
                \App\Section::create([
                    'book_id'       => $book->id,
                    'header'        => $section['header'][0],
                    'caption'       => $caption,
                    'description'   => $description,
                    'embed'         => $embed,
                    'type'          => $section['type'][0],
                ]);
                // $i++;
            }
        }


        // Attach Tags
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                if (!\App\Tag::exists($tag)) {
                    $tag = \App\Tag::create(['name' => $tag]);
                }
                $book->tags()->attach($tag);
            }
        }

        // return $request;
        return redirect('admin/books')->with('status', 'Book created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = \App\Book::find($id);

        $sections = $book->sections;

        $tags = $book->tags;

        return view('admin.books.edit', compact('book', 'sections', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Store Request Data
        Book::where('id', $id)
                ->update([
            'user_id'       => \Auth::id(),
            'title'         => request('title'),
            'publisher'     => request('publisher'),
            'image'         => request('image'),
            'alt_tags'      => request('alt_tags'),
            'amazon'        => request('amazon'),
            'introduction'  => request('introduction'),
            'about'         => request('about'),
                ]);

        // return request('section');
        // Check for dynamic sections $initial ?: 'default'
        if (request('section')) {
            // $i = 0;
            foreach (request('section') as $section) {
                $caption = isset($section['caption']) ? $section['caption'][0] : '';
                $description = isset($section['description']) ? $section['description'][0] : '';
                $embed = isset($section['embed']) ? $section['embed'][0] : '';
                \App\Section::where('id', $section['id'][0])
                ->update([
                    'book_id'       => $id,
                    'header'        => $section['header'][0],
                    'caption'       => $caption,
                    'description'   => $description,
                    'embed'         => $embed,
                    'type'          => $section['type'][0],
                ]);
                // $i++;
            }
        }


        // Attach Tags
        $book = \App\Book::find($id);

        $syncTags = [];

        // Attach Tags
        if (request('tags')) {
            foreach (request('tags') as $tag) {
                if (!\App\Tag::exists($tag)) {
                    $tag = \App\Tag::addNew($tag);
                }

                $bk = (int)$tag;
                array_push($syncTags, $bk);
            }

            // return $syncTags;
            $book->tags()->sync($syncTags);

        }

        // return $request;
        return redirect('admin/books')->with('status', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Book::destroy($id);
        // return back();
        return redirect('admin/books');
    }

    public function publish($id)
    {
        \App\Book::publish($id);

        return back();
    }

}
