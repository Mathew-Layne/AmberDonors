<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTransaction extends Model
{
    use HasFactory;

    public function haspital(){
        return $this->belongsTo(Hospital::class);
    }

    public function bloodType(){
        return $this->belongsTo(BloodType::class);
    }
}
