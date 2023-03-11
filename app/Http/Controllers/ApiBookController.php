<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\authors;
use Illuminate\Support\Str;
use App\Models\Author_Book_Join_Table;
use Illuminate\Support\Facades\Storage;

class ApiBookController extends Controller
{
    public function show(){
        $book = Book::all();
        $authors = authors::all();
        return response()->json([
            'product'=>[
                'books' => $book
            ],
            // 'authors' => $authors
        ], 200);
    }

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

        // return redirect(route('home'));
        return response()->json(
            [
                'Success' => 'Selamat anda telah membuat buku baru'
            ]
        );
    }

    public function edit(Request $request)
    {
        dd('test');
        // $rules = 'required';
        // $request->validate([
        //     'title' => $rules,
        //     'stock' => $rules,
        //     'content' => $rules,
        //     'category_id' => $rules,
        //     'bookImg' => 'mimes:png,jpg,pdf',
        //     'author_id' => $rules
        // ]);

        // $book = Book::find($id);

        // if($request->file('bookImg')){
        //     Storage::delete($book->bookImg);
        //     $img = $request->file('bookImg'); //ini cara request bentukan file
        //     $name_img = Str::random(10) . '_' . $img->getClientOriginalName(); //dapetin nama file sesuai input
        //     // dd($name_img);
        //     $img->storeAs('public/', $name_img); //function store image ke dalam storage
        //     $book->update([
        //         'bookImg' => $name_img
        //     ]);
        // }

        // $book->update([
        //     'title' => $request->title,
        //     'stock' => $request->stock,
        //     'content' => $request->content,
        //     'category_id' => $request->category_id
        // ]);

        // $author = Author_Book_Join_Table::where('book_id', $book->id)->get();
        // $authorJoinTable = $author[0]->id;

        // Author_Book_Join_Table::find($authorJoinTable)->update([
        //     'author_id' => $request->author_id
        // ]);
        // // $author = Author_Book_Join_Table::find($book->)

        // return response()->json(
        //     [
        //         'Success' => 'Selamat anda telah membuat buku baru'
        //     ]
        // );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('test');
        $authorJoinTable = Author_Book_Join_Table::where('book_id', $id)->delete();
        $book = Book::where('id', $id)->delete();

        // $delete->;

        return response()->json([
            'Success mendelete book id yang ke '. $id . ' dan author join table'
            // $book,
            // $authorJoinTable
        ]);
    }
}
