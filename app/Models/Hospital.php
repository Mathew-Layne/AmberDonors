<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_name', 
        'hospital_address', 
        'hospital_city', 
        'hospital_parish', 
        'hospital_email', 
        'hospital_phoneno', 
        'personnel_name', 
        'personnel_licence_no', 
        'user_id',
    ];	

    public function transaction(){
        return $this->hasMany(BloodTransaction::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    
}
