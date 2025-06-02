<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Auction extends Model
{
  use HasFactory;
  protected $fillable = [
    'car_id',
    'user_id',
    'minimum_bid',
    'current_bid',
    'start_date',
    'end_date',
    'status',
  ];
  public function car()
  {
    return $this->belongsTo(Car::class);
  }

  public function bids()
  {
    return $this->hasMany(Bid::class)->orderBy('bid_amount', 'desc');
  }

  public function winningBid()
  {

    return $this->hasOne(Bid::class)->orderBy('bid_amount', 'desc');
  }

}
