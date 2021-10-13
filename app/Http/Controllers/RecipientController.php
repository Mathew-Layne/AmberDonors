<?php

namespace App\Http\Controllers;

use App\Mail\RegisteredRecipient;
use Illuminate\Http\Request;
use App\Models\Recipient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RecipientController extends Controller
{
    public function index(){
        return view('dash.recipient');
    }

    public function register()
    {
     
        return view('recipientform');
    }

    public function store(Request $request)

    {        

        $validatedData = $request->validate([
            'recipient_name' => 'required',
            'carrier_name' => 'required',
            'company_name' => 'required',
            'company_email' => 'required|unique:recipients,company_email',
            'company_address' => 'required',
            'city' => 'required',
            'parish' => 'required',
            'blood_type' => 'required',
            'company_phoneno' => 'required',

        ]);

        Recipient::create([
            'recipient_name' => $request->recipient_name,
            'carrier_name' => $request->carrier_name,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
        'company_address' => $request->company_address,
        'city' => $request->city,
        'parish' => $request->parish,
        'blood_type' => $request->blood_type,
        'company_phoneno' => $request->company_phoneno,
        'user_id' => Auth::id(),
        ]);
        

        User::where('id', Auth::id())->update([
            'user_type' => 'Recipient',
        ]);

          Mail::to($request->recipient_email)->send(new RegisteredRecipient());
        return redirect('/');
    }
}
