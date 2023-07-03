<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businessDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'organisation_name',
        'organisation_address',
        'organisation_state',
        'organisation_city',
        'organisation_country',
        'organisation_phone',
        'organisation_email',
        'organisation_photos'
    ];
}
