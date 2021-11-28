<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->hasMany(BloodTransaction::class);
    }

    public function donor(){
        return $this->hasMany(Donor::class);
    }
}
