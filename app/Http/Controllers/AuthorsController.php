<?php

namespace App\Http\Controllers;

use App\Models\authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.createAuthorView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        authors::create([
            'name' => $request->name,
            'birth_of_date' => $request->birth_of_date
        ]);

        return redirect(route('home'));
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
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(authors $authors)
    {
        //
    }
}
