<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipient;
use Illuminate\Support\Facades\Auth;

class RecipientController extends Controller
{
    public function index(){
        return view('dash.patient');
    }

    public function register()
    {
     
        return view('recipientform');
    }

    public function store(Request $request)

    {        

        $validatedData = $request->validate([
            'recipient_name' => 'required',
            'blood_type' => 'required',
            'dob' => 'required',
            'recipient_address' => 'required',
            'city' => 'required',
            'parish' => 'required',
            'recipient_email' => 'required|unique:recipients,recipient_email',
            'recipient_phoneno' => 'required',

        ]);

        $recipient = new recipient();

        $recipient->recipient_name = $request->recipient_name;
        $recipient->blood_type = $request->blood_type;
        $recipient->dob = $request->dob;
        $recipient->recipient_address = $request->recipient_address;
        $recipient->city = $request->city;
        $recipient->parish = $request->parish;
        $recipient->recipient_email = $request->recipient_email;
        $recipient->recipient_phoneno = $request->recipient_phoneno;
        $recipient->user_id = Auth::id();

        $recipient->save();

        return redirect('/');
    }
}
