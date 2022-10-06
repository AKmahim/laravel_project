<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porder extends Model
{
    protected $fillable = [
        'customer_id',
        'product_name',
        'product_img',
        'price',
        'product_id',
        'qty',
        'time',
        'user_ip'
    ];
    use HasFactory;
}
