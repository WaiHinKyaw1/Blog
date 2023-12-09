<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        request()->validate([
            'body'=>['required']
        ]);

           $comment= $blog->comments()->create([
                'body'=>request('body'),
                'user_id'=>auth()->id()
            ]);

           $subscribers= $blog->subscribedUsers->filter(function($user){
                return $user->id !== auth()->id();
            })->each(function($subscriber) use($comment){
                Mail::to($subscriber->email)->queue(new SubscriberMail($subscriber, $comment));
            });

            return back();
    }
    public function destory(Comment $comment){

      $comment->delete();
        return back()->with('message','Delete Success!');
    }
    public function edit(Comment $comment){
        return view('comments.edit',[
            'comment'=>$comment,
        ]);
    }
    public function update(Comment $comment){
        $data=request()->validate([
            'body'=>['required']
        ]);
            $comment->body=$data['body'];
            $comment->update();
            return redirect('/blogs/'.$comment->blog->slug);
    }
}
