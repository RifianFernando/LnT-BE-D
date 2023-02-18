<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCreateCategory(){
        return view('createCategory');
    }

    public function create(Request $request){
        Category::create([
            'CategoryName' => $request->CategoryName
        ]);


        return redirect(route('home'));
    }
}
