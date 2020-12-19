<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'departure',
        'seats',
        'bookingAvaialble'
    ];

    public static function boot()
    {
        parent::boot();


        self::creating(function($train){
            $today = date("Y-m-d H:i:s");
            $departure = date_format(date_create($train->departure), 'Y-m-d H:i:s');
            $train->bookingAvaialble = strtotime($today) < strtotime($departure) ? true : false;
        });

        self::updating(function($model){
            $today = date("Y-m-d H:i:s");
            $departure = date_format(date_create($train->departure), 'Y-m-d H:i:s');
            $train->bookingAvaialble = strtotime($today) < strtotime($departure) ? true : false;
        });
    }
}
