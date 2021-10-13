<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_name',
        'carrier_name',
        'company_name',
        'company_email',
        'company_address',
        'city',
        'parish',
        'blood_type',
        'company_phoneno',

    ];
}
