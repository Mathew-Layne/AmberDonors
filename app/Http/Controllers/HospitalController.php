<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    //
    public function index(){
        return view('recipient');
    }

    public function register(){
        $blood_type = BloodType::all();
        return view('recipientform', compact('blood_type'));
    }

    public function store( Request $request){
        $validData = $this->validate($request,[
            'personnel_name' => 'required|string',
            'licence_No' => 'required|string',
            'hospital_name' => 'required|string',
            'hospital_email' =>'required|email',
            'hospital_address' => 'required|string',
            'city' => 'required|string',
            'parish' => 'required',
            'hospital_phoneno' => 'required|numeric'
        ]);

        Hospital::create([
            'hospital_name' => $request->hospital_name,
            'hospital_address' =>$request->hospital_address,
            'hospital_email' => $request->hospital_email,
            'hospital_city' => $request->city,
            'hospital_parish' =>$request->parish,
            'personnel_name'=> $request->personnel_name,
            'personnel_licence_no' => $request->licence_No,
            'hospital_phoneno' => $request->hospital_phoneno,
        ]);

        return redirect()->route('recipient');
    }
}
