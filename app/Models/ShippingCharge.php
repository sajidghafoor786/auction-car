<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCharge extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'country_id',
        'amount',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
