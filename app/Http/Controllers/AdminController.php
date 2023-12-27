<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFormRequest;
use App\Models\Blog;
use App\Models\Category;
use App\View\Components\Category as ComponentsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Symfony\Component\Routing\RequestContextAwareInterface;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',[
            'blogs'=>auth()->user()->blogs()->latest()->paginate(5)
        ]);
    }

    public function create(){
        return view('admin.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store(BlogFormRequest $request)
    {

       $cleanData= $request->validated();
            $cleanData['user_id']=auth()->id();
            // photo store
            $cleanData['photo']='/storage/'.request('photo')->store('/blogs');
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
    public function update(Blog $blog ,BlogFormRequest $requset){
        $cleanData= $requset->validated();

        if(request('photo')){
            $cleanData['photo']='/storage/'.request('photo')->store('/blogs');
// photo delete or photo path
            File::delete(public_path($blog->photo));
        }
            $blog->update($cleanData);
            return redirect('/admin');
    }

    // category
    public function categoryShow(){
        return view('admin.category-show',[
            'categories'=>Category::all()
        ]);
    }

    public function categoryCreate(){
        return view('admin.category-create');
    }
    public function categoryStore(Category $category){
        $data=request()->validate([
            'categoryName'=>['required'],
            'slug'=>['required']
        ]);
       $data['name']=request('categoryName');
       $data['slug']=request('slug');
       Category::create($data);
       return redirect()->route('adminCategory');
    }

    public function categoryEdit(Category $category)
    {

        return view('admin.category-edit',[
            'category'=>$category
        ]);
    }
    public function categoryUpdate(Category $category){
        $data=request()->validate([
            'name'=>['required'],
            'slug'=>['required']
        ]);
       $category->name=$data['name'];
       $category->slug=$data['slug'];
       $category->update();
        return redirect()->route('adminCategory');
    }
    public function categoryDestory(Category $category){
            $category->delete();
            return back();
    }

}
