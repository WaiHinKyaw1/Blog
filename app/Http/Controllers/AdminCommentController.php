<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.index',[
            'comments'=>Comment::all()
        ]);
    }

    public function edit(Comment $comment){
        return view('admin.comment.edit',[
            'comment'=>$comment,
        ]);
    }

    public function update(Comment $comment){
        $data=request()->validate([
            'status'=>['required']
        ]);
        $comment->status=$data['status'];
        $comment->save();
        return redirect()->route('commentIndex');
    }
}
