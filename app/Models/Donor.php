<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'blood_type',
        'dob',
        'donor_address',
        'city',
        'parish',
        'donor_phoneno',
        'profile_pic',
        'user_id',
    ];

}
