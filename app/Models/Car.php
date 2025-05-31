<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',     
        'make',
        'model',
        'year',
        'description',
        'image',
        'status',
    ];
}
