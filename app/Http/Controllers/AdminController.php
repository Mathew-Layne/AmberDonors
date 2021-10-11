<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        session()->put('admin', 'home');

        return view('dash.admin');
    }

    public function donor() {
        session()->put('admin', 'donor');
        
        return view('dash.admin');
    }

    public function patient() {
        session()->put('admin', 'patient');
        
        return view('dash.admin');
    }

    public function donations() {
        session()->put('admin', 'donations');
        
        return view('dash.admin');
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
