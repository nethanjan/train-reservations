<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_id',
        'nic',
        'seatCount'
    ];

    public static function boot()
    {
        parent::boot();


        self::creating(function($booking){
            // $booked seats = $booking->seatCount
            // reduce the number fo seats from the train
        });
    }
}
