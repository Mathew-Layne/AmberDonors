<?php

namespace App\Http\Controllers;


use App\Mail\RegisteredDonor;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonorController extends Controller
{
  public function index()
  {
    session()->put('donor', 'profile');

    $donors = Donor::where('user_id', Auth::id())->get();
    return view('dash.donor', compact('donors'));
  }

  public function register()
  {
    return view('donorform');
  }


  public function store(Request $request)

  {    

    $validatedData = $request->validate([
        'donor_name' => 'required',
        'blood_type' => 'required',
        'dob' => 'required',
        'donor_address' => 'required',
        'city' => 'required',
        'parish' => 'required',
        'donor_email' => 'required|unique:donors,donor_email',
        'donor_phoneno' => 'required',      

      ]);

    $donor = new Donor();

    $donor->donor_name = $request->donor_name;
    $donor->blood_type = $request->blood_type;
    $donor->dob = $request->dob;
    $donor->donor_address = $request->donor_address;
    $donor->city = $request->city;
    $donor->parish = $request->parish;
    $donor->donor_email = $request->donor_email;
    $donor->donor_phoneno = $request->donor_phoneno;
    $donor->user_id = Auth::id();

      User::where('id', Auth::id())->update([
        'user_type' => 'Donor',
      ]);

    $donor->save();
      Mail::to($request->donor_email)->send(new RegisteredDonor()); 
    return redirect('/dashboard/donor');
  }

  public function editDonor($id){

  }

  public function destroyDonor($id){
    User::where('id', Auth::id())
    ->delete();

    return redirect('/');
  }

  public function getBlood(){
    session()->put('donor', 'donateblood');

    return view('dash.donor');
  }

  public function storeBlood(){
    //
  }

  public function donationHistory(){
    session()->put('donor', 'donationhistory');
    
    return view('dash.donor');
  }
}
