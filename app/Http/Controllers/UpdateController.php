<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request) {
        $donor = User::find($request->id);

        return view('donorform_update',['donor' => $donor]);
    }

    public function onUpdate(Request $request) {
        User::where('id',$request->id)
            ->update(['donor_name' =>$request->donor_name,
                        'donor_email' => $request->donor_email,
                        'donor_address' => $request->donor_address,
                        'city' => $request->city,
                        'paroish' => $request->parrish,
                        'donor_phoneno' => $request->donor_phoneno,
            
        ]);
        return redirect('dash.admin');
    }
}
