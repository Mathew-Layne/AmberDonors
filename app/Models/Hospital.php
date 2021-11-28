<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function transaction(){
        return $this->hasMany(BloodTransaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
