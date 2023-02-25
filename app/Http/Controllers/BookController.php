<?php

namespace App\Http\Controllers;

use App\Models\Author_Book_Join_Table;
use App\Models\Book;
use App\Models\Category;
use App\Models\authors;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $book = Book::create([
            'title' => $request->title,
            'stock' => $request->stock,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        Author_Book_Join_Table::create([
            'book_id' => $book->id,
            'author_id' => $request->author_id
        ]);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // dd(Book::all());
        return view('welcome', [
            'books'=> Book::all()
        ]);
    }

    public function viewCreateBook()
    {

        return view ('createBookView', [
            'category' => category::all(),
            'authors' => authors::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function editView($id)
    {
        // $book = Book::find($id);
        // dd($book->AuthorJoinTable->author);

        return view('update-book', [
            'book' => Book::find($id),
            'category' => Category::all(),
            'authors' => authors::all()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update([
            'title' => $request->title,
            'stock' => $request->stock,
            'content' => $request->content,
            'category' => $request->category_id
        ]);
        // $author = Author_Book_Join_Table::find($book->)

        return redirect(route('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect(route('home'));
    }
}
