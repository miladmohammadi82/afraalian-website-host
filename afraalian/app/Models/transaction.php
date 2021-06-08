<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'grand_total', 'ref_id', 'token', 'status'
    ];

    protected $attributes = [
        'description' => 'خرید از وبسایت افراآلیان',
    ];
}
