<?php

namespace App\Http\Controllers;


use App\Mail\RegisteredDonor;
use App\Models\BloodDonation;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    $donor = Donor::find($id);
    return view('update',compact('donor',$donor));
  }

  public function updateDonor(Request $request){
     Donor::where('id', $request->id)->update([
      'donor_name' => $request->donor_name,
      'donor_address' => $request->donor_address, 
      'city' => $request->city,
      'parish' => $request->parish,
      'donor_email' => $request->donor_email,
      'donor_phoneno' => $request->donor_phoneno,
       ]);

        return redirect('dashboard/donor');
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

  public function storeBlood(Request $request){
    date_default_timezone_set('Jamaica');

    $valid = $request->validate([
      'units' => 'required',
    ]);

    $donor = Donor::where('user_id', Auth::id())->first();

    $donate = new BloodDonation();
    $donate->donor_id = $donor->id;
    $donate->date_donated = now();
    $donate->blood_quantity = $request->units;
    $donate ->save();

    return redirect('dashboard/donor');
  }

  public function donationHistory(){
    session()->put('donor', 'donationhistory');
    $donor = Donor::where('user_id', Auth::id())->first();

    $donations = DB::table('blood_donations')
    ->join('donors', 'blood_donations.donor_id', 'donors.id')
    ->where('donor_id', $donor->id)
    ->get();
    return view('dash.donor', compact('donations'));
  }
}
