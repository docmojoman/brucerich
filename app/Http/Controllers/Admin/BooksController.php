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
        $library = true;

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
        // dd($request);
        $this->validate($request, [
                'title'         => 'required',
                'menu_title'    => 'required'
            ]);

        $book = \App\Book::create([
            'user_id'       => \Auth::id(),
            'title'         => $request->title,
            'menu_title'    => $request->menu_title,
            'author'        => $request->author,
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
                $tagHasId = \App\Tag::hasId($tag);
                if ($tagHasId) {
                    if (\App\Tag::taggedAlready($tagHasId, $book->id, 'book')->count() <= 0) {
                        $book->tags()->attach($tagHasId);
                    }
                } else {
                    $newTag = \App\Tag::create(['name' => $tag]);
                    $book->tags()->attach($newTag->id);
                }
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

        $library = true;

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
        // return request();
        // Store Request Data
        Book::where('id', $id)
                ->update([
            'user_id'       => \Auth::id(),
            'title'         => request('title'),
            'menu_title'    => request('menu_title'),
            'author'        => request('author'),
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

        // Check for NEW DYNAMIC sections
        if (request('n_section')) {
            foreach (request('n_section') as $n_section) {
                $caption = isset($n_section['caption']) ? $n_section['caption'][0] : '';
                $description = isset($n_section['description']) ? $n_section['description'][0] : '';
                $embed = isset($n_section['embed']) ? $n_section['embed'][0] : '';
                \App\Section::create([
                    'book_id'       => $id,
                    'header'        => $n_section['header'][0],
                    'caption'       => $caption,
                    'description'   => $description,
                    'embed'         => $embed,
                    'type'          => $n_section['type'][0],
                ]);
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

        } else {
            // Detach All Tags
            $oldTags = $book->tags()->pluck('id');
            // return $oldTags;
            $book->tags()->detach($oldTags);
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
