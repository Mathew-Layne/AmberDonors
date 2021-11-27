<?php

namespace App\Http\Controllers;

use App\Mail\RegisteredRecipient;
use App\Models\BloodType;
use Illuminate\Http\Request;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RecipientController extends Controller
{
    public function index()
    {
        session()->put('recipient', 'profile');

        $recipients = Recipient::where('id', Auth::id())->get();
        return view('dash.recipient', compact('recipients'));
    }

    public function register()
    {
       $blood_type = BloodType::all();
        return view('recipientform', compact('blood_type'));
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

        $recipients = new Recipient();

            $recipients->recipient_name = $request->recipient_name;
            $recipients->carrier_name = $request->carrier_name;
            $recipients->company_name = $request->company_name;
            $recipients->company_email = $request->company_email;
            $recipients->company_address = $request->company_address;
            $recipients->city = $request->city;
            $recipients->parish = $request->parish;
            $recipients->blood_type = $request->blood_type;
            $recipients->company_phoneno = $request->company_phoneno;
            $recipients->user_id = Auth::id();
        
        

        User::where('id', Auth::id())->update([
            'user_type' => 'Recipient',
        ]);
        $recipients->save();
          Mail::to($request->recipient_email)->send(new RegisteredRecipient());
        return redirect('/dashboard/recipient');
    }

    public function editRecipient($id){

    }
  
    public function destroyRecipient($id){
      User::where('id', Auth::id())
      ->delete();
  
      return redirect('/');
    }
}
