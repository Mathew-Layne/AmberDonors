<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    use HasFactory;

    public function bloodType(){
        return $this->belongsTo(BloodType::class);
    }

    protected $fillable = [
        'blood_type_id', 'total_quantity',
    ];
}
