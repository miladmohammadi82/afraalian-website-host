<?php

namespace App\Models\FrontModels;

use App\Models\ProductComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'details',
        'price',
        'index_image',
        'image_gallery1',
        'image_gallery2',
        'image_gallery3'

    ];

    protected $attributes = [
        'active' => 1,
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
