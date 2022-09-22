<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;


class Cart extends Model
{

    protected $fillable = [
        'product_id','qty','price','user_ip'
    ];
    public function product(){
        return $this->belongsTo(Products::class,'product_id');
    }
    use HasFactory;
}
