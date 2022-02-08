<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\BloodStock;
use App\Models\BloodTransaction;
use App\Models\BloodType;
use App\Models\DonationCamp;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Hospital;
use App\Models\Recipient;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        session()->put('admin', 'home');
        
        $donor = Donor::count();
        $hospital = Hospital::count();
        $donation = BloodDonation::sum('blood_quantity');
        $request = BloodTransaction::count();
        $unitsRequested = BloodTransaction::sum('quantity');
        $unitsStock = BloodStock::sum('total_quantity');
        $stocks = BloodStock::all();
        return view('dash.admin', compact('donor', 'hospital','donation', 'request', 'unitsRequested', 'stocks', 'unitsStock'));
        }
        
    public function donor() {
        session()->put('admin', 'donor');
        $donors = Donor::get();  
        return view('dash.admin', compact('donors'));
    }

    public function recipient() {
        session()->put('admin', 'recipient');
        $recipients = Hospital::all();
        return view('dash.admin', compact('recipients'));
    }

    public function donations() {
        session()->put('admin', 'donations');

        $donations = BloodDonation::paginate(5);

        return view('dash.admin', compact('donations'));
    }

    public function blood_request() {
        session()->put('admin', 'blood_request');
        $transactions = BloodTransaction::where('status', 'pending')->get();
        return view('dash.admin', compact('transactions'));
    }

    public function approveRequest($id){
        BloodTransaction::where('id', $id)->update([
            'status' => 'Approved',
        ]);

       $transaction =  BloodTransaction::where('id', $id)->first();

       $total_quantity = BloodStock::where('blood_type_id', $transaction->blood_type_id)
        ->where('donation_camp_id', $transaction->donation_camp_id)->value('total_quantity');

        
        BloodStock::where('blood_type_id', $transaction->blood_type_id) 
        ->where('donation_camp_id', $transaction->donation_camp_id)->update([
            'total_quantity' => $total_quantity - $transaction->quantity,
        ]);

        return redirect()->route('bloodRequest');
    }

    public function rejectRequest($id)
    {
        BloodTransaction::where('id', $id)->update([
            'status' => 'Rejected',
        ]);
        return redirect()->route('bloodRequest');
    }

    public function request_history() {
        session()->put('admin', 'request_history');
        $requests = BloodTransaction::where('status','!=', 'pending')->get();
        return view('dash.admin', compact('requests'));
    }

    public function test() {        
        
        return view('dash.testing');
    }

    public function camp(){
        session()->put('admin', 'camp');

        return view('dash.admin');
    }

    public function storeCamp(Request $request){

        $request->validate([
            'branch_name' => 'required',
            'branch_address' => 'required',
            'branch_number' => 'required',
            'hours' => 'required',
        ]);

        $camp = new DonationCamp;
        $camp->branch_name = $request->branch_name;
        $camp->branch_address = $request->branch_address;
        $camp->branch_phoneNo = $request->branch_number;
        $camp->opening_hours = $request->hours;
        $camp->save();

        return redirect()->back()->with('camp', 'Donation Camp Successfully Added');
    }
}
