<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class BlogController extends Controller
{

    public function index(){
            $Filters=request(['search','category','author']);
            $userType=auth()->user()->is_admin;

            if($userType == true){
                return redirect()->route('admin');
            }
            else{
                return view('blogs.index',[
                    'blogs'=>Blog::with('category','author')
                    ->filter($Filters)
                    ->latest()
                    ->paginate(3)
                    ->withQueryString(),

                ]);
            }
    }
    public function show(Blog $blog){
            return view('blogs.show',[
                'blog'=>$blog,
                'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
            ]);
        }


}
