<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Car;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = [
        'auction_id',
        'user_id',
        'bid_amount',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class );
    }
}
