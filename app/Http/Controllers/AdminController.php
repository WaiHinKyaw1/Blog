<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'blogs'=>Blog::with('category')->paginate(5)
        ]);
    }

    public function create(){
        return view('admin.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {

       $cleanData= request()->validate([
            'title'=>['required'],
            'slug'=>['required'],
            'body'=>['required'],
            'category_id'=>['required']
            ]);
            $cleanData['user_id']=auth()->id();
            Blog::create($cleanData);
            return redirect('/admin');
    }

    public function destory(Blog $blog){
        $blog->delete();
        return back();
    }
    public function edit(Blog $blog){
        return view('admin.edit',[
            'categories'=>Category::all(),
            'blog'=>$blog
        ]);
    }
    public function update(Blog $blog){
        $blog->update();
        return redirect('/admin');
    }
}



