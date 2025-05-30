<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = 
    [
     'id',
     'image',
     'product_id'
    ];



    // ProductImage model
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

}
