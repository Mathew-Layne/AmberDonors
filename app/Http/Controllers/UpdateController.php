<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request) {
        $donor = User::find($request->id);

        return view('update',['donor' => $donor]);
    }

    public function onUpdate(Request $request) {
        User::where('id',$request->id)
            ->update(['donor_name' =>$request->donor_name,
                        'donor_email' => $request->donor_email,
                        'donor_address' => $request->donor_address,
                        'city' => $request->city,
                        'parish' => $request->parrish,
                        'donor_phoneno' => $request->donor_phoneno,
            
        ]);
        return redirect('dash.admin');
    }

    // public function approve(Request $request) {
    //     $donor = User::find($request->id)->get();
    //     // dd($donor);
    //     return view('dash.admin',['donors' => $donor]);
    // }

    public function onApprove($id) {
       Donor::where('user_id', $id)->update([
            'status' => 'Approved',
       ]);
            return redirect()->back()->with('success', 'Approved');
        }
        public function onReject($id) {
       Donor::where('user_id', $id)->update([
           'status' => 'Rejected',
       ]);
            return redirect()->back()->with('fail', 'Rejected');
        }


        public function approve($id) {
            Recipient::where('id', $id)->update([
                 'status' => 'Approved',
            ]);
                 return redirect()->back()->with('success', 'Approved');
             }
             public function reject($id) {
            Recipient::where('id', $id)->update([
                'status' => 'Rejected',
            ]);
                 return redirect()->back()->with('fail', 'Rejected');
             }


    // public function approve($id){
    //     $leave = App\Models\Leave::findOrFail($id);
    //     $leave->status = 1; //Approved
    //     $leave->save();
    //     return redirect()->back(); //Redirect user somewhere
    //  }


    // public function reject(Request $request) {
    //     $donor = User::find($request->id);

    //     return view('dash.admin',['donor' => $donor]);
    // }

}
