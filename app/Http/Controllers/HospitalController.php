<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Models\BloodTransaction;
use App\Models\BloodType;
use App\Models\DonationCamp;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    //
    public function index(){
        $hospital_id = Hospital::where('user_id', Auth::id())->value('id');
        // dd($hospital_id);
            $requestAll = BloodTransaction::where('hospital_id', $hospital_id)->count();
            $approved = BloodTransaction::where('hospital_id', $hospital_id)->where('status', 'Approved')->count();
            $rejected= BloodTransaction::where('hospital_id', $hospital_id)->where('status', 'Rejected')->count();
        return view('recipientdash', compact('requestAll', 'approved', 'rejected'));
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
            'hospital_city' => 'required|string',
            'hospital_parish' => 'required',
            'hospital_phoneno' => 'required|numeric'
        ]);

        Hospital::create([
            'user_id'=> Auth::id(),
            'hospital_name' => $request->hospital_name,
            'hospital_address' =>$request->hospital_address,
            'hospital_email' => $request->hospital_email,
            'hospital_city' => $request->city,
            'hospital_parish' =>$request->parish,
            'personnel_licence_no' => $request->licence_No,
            'hospital_phoneno' => $request->hospital_phoneno,
        ]);

        User::where('id', Auth::id())->update([
            'user_type' => 'Recipient'
        ]);

        return redirect('dashboard/recipient');
    }

    public function bloodRequest(){
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $blood_type = BloodType::all();
        $bloodBank = DonationCamp::all();
        return view('hospitalrequest', compact('blood_type', 'hospital', 'bloodBank'));
    }

    public function storeRequest(Request $request){
        $this->validate($request,[
            'blood_quantity' => 'required|numeric',
            'blood_type_id' => 'required',
            'camp_id' => 'required',
        ]);

        $bloodAvail = BloodStock::where('blood_type_id', $request->blood_type_id)->where('donation_camp_id', $request->camp_id)->value('total_quantity');
        
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
            'donation_camp_id'=> $request->camp_id,
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
