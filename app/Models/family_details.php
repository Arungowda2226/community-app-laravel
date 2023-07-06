<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class family_details extends Model
{
    use HasFactory;
        protected $fillable=[
        'user_id',
        'name',
        'phone',
        'email',
        'relation',
        'photo',
        'DOB',
        'married',
        'gender',
        'origin_city',
        'blood_group'
    ];
}
