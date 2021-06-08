<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{

    protected $fillable = [
        'body',
        'status',
        'user_id',
        'article_id',
        'parent_id',
    ];

    protected $attribute = [
        'status' => 0,
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ArticleComment::class, 'parent_id');
    }
}
