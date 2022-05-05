<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    //Fields that we can fill
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price'
    ];
}
