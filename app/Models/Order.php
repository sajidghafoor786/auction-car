<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subtotal',
        'shipping',
        'coupen_code',
        'discount',
        'grand_total',
        'f_name',
        'last_name',
        'email',
        'country',
        'address',
        'city',
        'state',
        'phone_no',
    ];

    public function Users(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
