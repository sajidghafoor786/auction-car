<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'f_name',
        'last_name',
        'email',
        'country',
        'address',
        'city',
        'state',
        'phone_no',
    ];
}
