<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\checkout;

class Order extends Model
{
    
    protected $fillable = [
        'customer_id',
        'product_name',
        'product_img',
        'price',
        'qty',
        'total',
    ];
    
    public function checkout(){
        return $this->hasMany(checkout::class,'user_ip','user_ip');
    }

    use HasFactory;
}
