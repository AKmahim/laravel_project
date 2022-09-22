<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiimg extends Model
{
    protected $fillable = [
    'image',
    ];
    
    use HasFactory;
}
