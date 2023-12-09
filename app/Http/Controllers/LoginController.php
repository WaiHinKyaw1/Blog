<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Backtrace\Backtrace;

class LoginController extends Controller
{
    public function loginPage(){

        return view('login.loginPage');
    }
    public function store(){
         $cleanData=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required']
         ]);


            if(Auth::attempt($cleanData)){

                return redirect('/')->with('message','Welcome'.auth()->user()->name);
            }else{
                return back()->withErrors(['password'=>'Your Password is incorrcet']);
            }

    }

}
