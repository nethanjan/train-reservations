<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Train extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];  

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
            $train->bookingAvaialble = $train->seats < 1 ? false : true;
        });

        self::updating(function($train){
            $today = date("Y-m-d H:i:s");
            $departure = date_format(date_create($train->departure), 'Y-m-d H:i:s');
            $train->bookingAvaialble = strtotime($today) < strtotime($departure) ? true : false;
            $train->bookingAvaialble = $train->seats < 1 ? false : true;
        });
    }
}
