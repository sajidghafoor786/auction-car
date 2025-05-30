<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'compare_price',
        'category_id',
        'sub_category_id',
        'brands_id',
        'is_featured',
        'sku',
        'barcode',
        'track_qty',
        'qty',
        'image',
        'status',
    ];

    // Product model
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

}
