<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $fillable = [
        'product_name',
        'product_img',
        'price',
        'old_price',
        'product_details',
        'category',
        
    ];

    use HasFactory;
}
