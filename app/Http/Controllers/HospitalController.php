<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //

    public function index(){
        $blood_type = BloodType::all();
        return view('recipientform', compact('blood_type'));
    }
}
