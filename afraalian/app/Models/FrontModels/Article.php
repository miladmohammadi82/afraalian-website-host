<?php

namespace App\Models\FrontModels;

use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'user_id', 'hit', 'status'
    ];

    protected $attributes = [
        'hit' => 1,
        'status' => 1
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function getIsUserLikedAttribute()
    {
        if (auth()->check() && auth()->user()) {
            return $this->likes()->where('user_id', auth()->user()->id)->exists();
        }


    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
