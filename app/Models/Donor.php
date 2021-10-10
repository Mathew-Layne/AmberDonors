<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'donor_email',
        'sex',
        'blod_type',
        'donor_address',
        'donor_phoneno',
        'total_donation',
        'last_donation_date',
    ];

}
