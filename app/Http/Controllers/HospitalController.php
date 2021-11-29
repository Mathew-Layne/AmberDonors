<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Models\BloodTransaction;
use App\Models\BloodType;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    //
    public function index(){
        $recipients = Hospital::all();
        return view('dash.recipient', compact('recipients'));
    }

    public function register(){
        $blood_type = BloodType::all();
        return view('recipientform', compact('blood_type'));
    }

    public function store( Request $request){
         $this->validate($request,[
            'licence_No' => 'required|string',
            'hospital_name' => 'required|string',
            'hospital_email' =>'required|email',
            'hospital_address' => 'required|string',
            'city' => 'required|string',
            'parish' => 'required',
            'hospital_phoneno' => 'required|numeric'
        ]);

        Hospital::create([
            'user_id'=> Auth::user()->id,
            'hospital_name' => $request->hospital_name,
            'hospital_address' =>$request->hospital_address,
            'hospital_email' => $request->hospital_email,
            'hospital_city' => $request->city,
            'hospital_parish' =>$request->parish,
            'personnel_licence_no' => $request->licence_No,
            'hospital_phoneno' => $request->hospital_phoneno,
        ]);

        return redirect('dashboard/recipient');
    }

    public function bloodRequest(){
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $blood_type = BloodType::all();
        return view('hospitalrequest', compact('blood_type', 'hospital'));
    }

    public function storeRequest(Request $request){
        $this->validate($request,[
            'blood_quantity' => 'required|numeric',
            'blood_type_id' => 'required',
        ]);

        $bloodAvail = BloodStock::where('blood_type_id', $request->blood_type_id)->sum('total_quantity');
        
        // dd($bloodAvail);

        if($bloodAvail <= $request->blood_quantity){
        
            return redirect()->back()->with('status', 'Request Exceeds Availability');
        
        }else
        {

        BloodTransaction::create([
            'hospital_id' => $request->hospital_id,
            'date_requested' => now(),
            'quantity' =>$request->blood_quantity,
            'blood_type_id' => $request->blood_type_id,
        ]);
            return redirect()->route('pendingRequest');
    }

        
    }

    public function pendingRequest(){
        $request = BloodTransaction::where('status', 'pending')->get();
        return view('pendingRequest', compact('request'));
    }

    public function allRequests(){
        $allRequest = BloodTransaction::where('status', '!=', 'pending')->get();
        return view('allRequests', compact('allRequest'));
    }
}
