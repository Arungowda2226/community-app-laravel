<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckUsers extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'father_name',
    'mother_name',
    'photo',
    'phone',
    'email',
    'DOB',
    'gender',
    'married',
    'blood_group',
    'address',
    'state',
    'city',
    'pincode',
    'country',
    'origin_address',
    'origin_state',
    'origin_city',
    'origin_pincode'
    ];
}
