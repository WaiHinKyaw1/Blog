<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function userShow(User $author){
        return view('blogs.index',[
            'blogs'=>$author->blogs()->with('category','auther')->paginate(3),

        ]);

}
}
