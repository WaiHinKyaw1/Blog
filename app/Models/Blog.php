<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','body','category_id','user_id'];
    protected static function booted()
    {
        static::deleting(function ($item) {
            $item->comments()->delete();
            $item->subscribedUsers()->delete();
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function subscribedUsers()
    {
        return $this->belongsToMany(User::class, 'blogs_users');
    }
    public function isSubscribeBy($user)
    {

        return $this->subscribedUsers->contains('id',$user->id);
    }


    public function scopeFilter($blogquery, $Filters)
    {
        if ($Filters['search'] ?? null) {
            $blogquery
                ->where(function ($blogquery) use ($Filters) {
                    $blogquery
                        ->where('title', 'Like', '%' . $Filters['search'] . '%')
                        ->orWhere('body', 'Like', '%' . $Filters['search'] . '%');
                });
        }
        if ($Filters['category'] ?? null) {
            $blogquery->whereHas('category', function ($catQuery) use ($Filters) {
                $catQuery->where('slug', $Filters['category']);
            });
        }
        if ($Filters['author'] ?? null) {
            $blogquery->whereHas('author', function ($userQuery) use ($Filters) {
                $userQuery->where('username', $Filters['author']);
            });
        }
    }
}
