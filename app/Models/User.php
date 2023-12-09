<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class,'blogs_users');
    }
    protected $casts=[
        'email_verified_at'=>'datetime',
          'password'=>'hashed'
     ];
}
