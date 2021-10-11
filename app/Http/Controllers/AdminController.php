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

    public function test() {
        
        
        return view('dash.testing');
    }
}
