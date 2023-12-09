<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function toggle(Blog $blog){

        if($blog->isSubscribeBy(auth()->user())){
            $blog->subscribedUsers()->detach(auth()->user());
        }
         else{
            $blog->subscribedUsers()->attach(auth()->user());
         }

         return back();
    }
}
