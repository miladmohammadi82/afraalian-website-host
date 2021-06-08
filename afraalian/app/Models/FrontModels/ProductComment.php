<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body', 'name', 'email'
    ];
    protected $attributes = [
        'status' => 0,
    ];

    public function replies()
    {
        return $this->hasMany(ArticleComment::class, 'parent_id');
    }
}
