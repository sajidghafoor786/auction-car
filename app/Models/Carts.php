<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'qty',
    ];

    use HasFactory;
    //  relationship 
    public function Product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
