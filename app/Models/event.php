<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'photo',
        'event_name',
        'event_description',
        'registration_start_date',
        'registration_end_date',
        'event_date_time',
        'name',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'bus_facility',
        'invitation',
        'event_price',
        'registration_required',
        'price_per_member',
        'age<6_Price',
        'age<18_Price',
        'age>60_Price',
        'addtional_name',
        'addtional_price'
    ];
}
