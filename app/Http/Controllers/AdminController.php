<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Recipient;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        session()->put('admin', 'home');
        
        return view('dash.admin');
    }

    public function donor() {
        session()->put('admin', 'donor');
        $donors = Donor::where('status', 'Pending')->get();  
        return view('dash.admin', compact('donors'));
    }

    public function recipient() {
        session()->put('admin', 'recipient');
        $recipients = Recipient::where('status', 'Pending')->get();
        return view('dash.admin', compact('recipients'));
    }

    public function donations() {
        session()->put('admin', 'donations');

        $donations = DB::table('blood_donations')
        ->join('donors', 'blood_donations.donor_id', 'donors.id')        
        ->get();

        return view('dash.admin', compact('donations'));
    }

    public function blood_request() {
        session()->put('admin', 'blood_request');
        
        return view('dash.admin');
    }

    public function request_history() {
        session()->put('admin', 'request_history');
        
        return view('dash.admin');
    }

    public function test() {
        
        
        return view('dash.testing');
    }
}
