<?php

namespace App\Models;

use App\Models\FrontModels\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
