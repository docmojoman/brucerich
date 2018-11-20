<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = \App\User::find(1)->books()->get();

        $books = \App\Book::books();

        // dd($books);
        return view('books.index', compact('books'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book = \App\Book::find($id);

        // return $book;

        $sections = $book->sections;

        $tags = $book->tags;

        // dd($sections);

        return view('books.show', compact('book', 'sections', 'tags'));
    }

}
