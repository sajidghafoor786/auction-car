<?php

namespace App\Models;


use App\Models\Sub_Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'status', 
        'slug',
        'image',
    ];
 public function sub_category(){
        return $this->hasMany(Sub_Category::class,);
 }
}
