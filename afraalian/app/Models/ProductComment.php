<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body', 'name', 'email', 'user_id'
    ];

    protected $attributes = [
        'status' => 0,
    ];

    public function replies()
    {
        return $this->hasMany(ProductComment::class, 'parent_id');
    }
}
