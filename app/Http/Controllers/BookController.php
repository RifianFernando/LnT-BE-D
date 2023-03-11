<?php

namespace App\Http\Controllers;

use App\Models\Author_Book_Join_Table;
use App\Models\Book;
use App\Models\Category;
use App\Models\authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

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
        $rules = 'required';
        $request->validate([
            'title' => $rules,
            'stock' => $rules,
            'content' => $rules,
            'category_id' => $rules,
            'bookImg' => $rules . '|mimes:png,jpg,pdf',
        ]);
        $img = $request->file('bookImg'); //ini cara request bentukan file
        $name_img = Str::random(10) . '_' . $img->getClientOriginalName(); //dapetin nama file sesuai input
        // dd($name_img);
        $img->storeAs('public/', $name_img); //function store image ke dalam storage


        $book = Book::create([
            'title' => $request->title,
            'stock' => $request->stock,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'bookImg' => $name_img
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
            'books' => Book::all()
        ]);
    }

    public function viewCreateBook()
    {

        return view('createBookView', [
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
        $book = Book::find($id);
        $author = Author_Book_Join_Table::where('book_id', $book->id)->get();
        $book->author_id = $author[0]->author_id;
        // dd($book->author_id);

        return view('update-book', [
            'book' => $book,
            'category' => Category::all(),
            'authors' => authors::all()
        ]);
    }

    public function editSome(Request $request, $id)
    {
        // dd('test');
        $rules = 'required';
        $request->validate([
            'title' => $rules,
            'stock' => $rules,
            'content' => $rules,
            'category_id' => $rules,
            'bookImg' => 'mimes:png,jpg,pdf',
            'author_id' => $rules
        ]);

        $book = Book::find($id);

        if($request->file('bookImg')){
            Storage::delete($book->bookImg);
            $img = $request->file('bookImg'); //ini cara request bentukan file
            $name_img = Str::random(10) . '_' . $img->getClientOriginalName(); //dapetin nama file sesuai input
            // dd($name_img);
            $img->storeAs('public/', $name_img); //function store image ke dalam storage
            $book->update([
                'bookImg' => $name_img
            ]);
        }

        $book->update([
            'title' => $request->title,
            'stock' => $request->stock,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        $author = Author_Book_Join_Table::where('book_id', $book->id)->get();
        $authorJoinTable = $author[0]->id;

        Author_Book_Join_Table::find($authorJoinTable)->update([
            'author_id' => $request->author_id
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
