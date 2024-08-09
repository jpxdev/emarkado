<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorAuthController extends Controller
{
    //

    public function getVendorLogin() {
        return view('vendor.auth.vendor_login');
    }
    public function dashboard() {
        return view('vendor.pages.dashboard');
    }

    public function postVendorLogin(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $validated=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password

        ],$request->password); // this is for "remember me" function


        if($validated){
            return redirect()->route('vendor-dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
}
