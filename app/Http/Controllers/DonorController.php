<?php

namespace App\Http\Controllers;


use App\Mail\RegisteredDonor;
use App\Models\BloodDonation;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\DonationCamp;
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
    $donationCount = BloodDonation::where('donor_id', Auth::id())->count();

    return view('dash.donor', compact('donors', 'donationCount'));
  }

  public function register()
  {
    return view('donorform', ['blood_type' => BloodType::all(),]);
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

    $current_date = now();
    $dob = date_create($request->dob);

    if(date_diff($current_date, $dob)->y < 18){
      return redirect()->back()->with('underage', 'You Must Be 18 Years or Older to Become a Donor');
    }

    $donor = new Donor();

    $donor->donor_name = $request->donor_name;
    $donor->blood_type_id = $request->blood_type;
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

  public function editDonor($id)
  {
    $donor = Donor::find($id);
    return view('update', compact('donor', $donor));
  }

  public function updateDonor(Request $request)
  {
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

  public function destroyDonor($id)
  {
    User::where('id', Auth::id())
      ->delete();

    return redirect('/');
  }

  public function getBlood()
  {
    session()->put('donor', 'donateblood');

    return view('dash.donor', ['camps' => DonationCamp::all()]);
  }

  public function storeBlood(Request $request)
  {
    date_default_timezone_set('Jamaica');

    $valid = $request->validate([
      'units' => 'required',
      'camp' => 'required',

    ]);

    $donor = Donor::where('user_id', Auth::id())->first();    

    $donate = new BloodDonation();
    $donate->donor_id = $donor->id;
    $donate->date_donated = now();
    $donate->blood_quantity = $request->units;
    $donate->donation_camp_id = $request->camp;
    $donate->save();

    $check = BloodStock::where('blood_type_id', $donor->blood_type_id)
    ->where('donation_camp_id', $request->camp)->count();
    
    if ($check == 1) {
      $quantity = BloodStock::where('blood_type_id', $donor->blood_type_id)->value('total_quantity');

      BloodStock::where('blood_type_id', $donor->blood_type_id)->where('donation_camp_id', $request->camp)->update([
        'total_quantity' => $quantity + $request->units,
      ]);
    } else {
      BloodStock::create([
        'donation_camp_id' => $request->camp,
        'blood_type_id' => $donor->blood_type_id,
        'total_quantity' => $request->units,
      ]);
    }

    return redirect()->back()->with('donated', 'Blood Donation Was A Success!!');

    // return redirect()->action([BloodDonationController::class, 'index']);
  }

  public function donationHistory()
  {
    session()->put('donor', 'donationhistory');

    $donations = BloodDonation::where('donor_id', Auth::id())
      ->with('camp')
      ->get();

    return view('dash.donor', compact('donations'));
  }
}
