<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Order;
// use App\Models\Order;



class checkout extends Model
{
    

    protected $fillable = [
        'customer_name','customer_address','customer_no',
        'user_ip'
    ];

    

    
    

    use HasFactory;
    
}
