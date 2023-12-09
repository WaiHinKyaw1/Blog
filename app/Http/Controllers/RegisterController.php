<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $cleanData=request()->validate([
            'name'=>['required','max:10'],
            'email'=>['required','email'],
            'userName'=>['required','max:10'],
            'password'=>['required','min:6','max:10']
        ]);
       $user=new User();
       $user->name=$cleanData['name'];
       $user->email=$cleanData['email'];
       $user->username=$cleanData['userName'];
       $user->password=$cleanData['password'];
       $user->save();

       Auth::login($user);


       return redirect('/')->with('message','Welcome'.  $user->name);
    }

}
