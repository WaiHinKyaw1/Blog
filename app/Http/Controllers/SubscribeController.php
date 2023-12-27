<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subscribe;
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
    public function emailStore(Subscribe $subscribe){
      $data=request()->validate([
            'email'=>['required']
        ]);
$subscribe->email=$data['email'];
$subscribe->save();
        return redirect('/');

    }
}
