<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryShow(Category $category)
    {
    return view('blogs.index',[
        'blogs'=>$category->blogs()->with('category','auther')->paginate(3),
        'currentCategory'=>$category
    ]);
}
}
