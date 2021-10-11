<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
  public function index()
  {
    return view('dash.donor');
  }
  public function register()
  {
    return view('donorform');
  }

  public function store(Request $request)

  {
    // dd($request->all());

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

    $donor->save();

    return redirect('/');
  }
}
