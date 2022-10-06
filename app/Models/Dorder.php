<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorder extends Model
{
    protected $fillable = [
        'customer_name','customer_address','customer_no','email','payment_mode','order_status',
        'user_ip'
    ];
    use HasFactory;
}
