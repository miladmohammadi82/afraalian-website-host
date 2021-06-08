<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'name',
        'description',
        'details',
        'slug',
        'price',
        'previous_price',
        'index_image',
        'image_gallery1',
        'image_gallery2',
        'image_gallery3',
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


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }

}
