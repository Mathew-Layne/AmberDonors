<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function donate_submit(){
        return view('Donor_Form');
    }

    public function store(Request $request)

    {
        // dd($request->all());

        $validatedData = $request->validate
        ([
          'donor_name' => 'required',
          'sex' => 'required',
          'blood_type' => 'required',
          'donor_address' => 'required',
          'donor_email' => 'required',
          'donor_phoneno' => 'required',
          'total_donation' => 'required',
          'last_donation_date' => 'required',

        ]);
          $donor = new Donor;

            $donor->donor_name = $request->donor_name;
            $donor->donor_email = $request->donor_email;
            $donor->sex = $request->sex;
            $donor->blood_type = $request->blood_type;
            $donor->donor_address = $request->donor_address;
            $donor->donor_phoneno = $request->donor_phoneno;
            $donor->total_donation = $request->total_donation;
            $donor->last_donation_date = $request->last_donation_date;


            $donor->save();

            return redirect('Donor_form')->with('status', 'Form Data Has Been validated and insert');

    }
}
