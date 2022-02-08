<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCamp extends Model
{
    use HasFactory;

    public function donation(){
        return $this->hasMany(BloodDonation::class);
    }

    public function bloodStock()
    {
        return $this->hasMany(BloodStock::class);
    }
}
