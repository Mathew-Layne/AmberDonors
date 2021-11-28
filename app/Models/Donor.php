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
        'status',
        'user_id',
    ];

    public function donation()
    {
        return $this->hasMany(BloodDonation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    } 
}
