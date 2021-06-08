<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addres extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_fullname',
        'shopping_address',
        'shopping_zipcode',
        'shopping_phone',
        'shopping_state',
        'shopping_city'
    ];
}
