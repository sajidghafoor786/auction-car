<?php

namespace App\Models;

use App\Models\ShippingCharge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = [
        'id',
        'name',
        'code',
    ];

    public function shipping()
    {
        return $this->hasMany(ShippingCharge::class, 'country_id', 'id');
    }
}
