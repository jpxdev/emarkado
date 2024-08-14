<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_Data\{AdminModel, VendorModel, MerchantModel};
use App\Helpers\Functions;

class UserController extends Controller
{

    public function vendor()
    {
        $vendors = VendorModel::all();
        $data = [
            'title' => 'Vendor',
            'vendors' => $vendors
        ];
        return view('admin.pages.vendor', $data); //url path in folder resources/views/admin/pages/vendor.blade.php
    }

    public function merchant()
    {
        $merchants = MerchantModel::all();
        $data = [
            'title' => 'Merchant',
            'merchants' => $merchants
        ];
        return view('admin.pages.merchant', $data); //url path in folder resources/views/admin/pages/merchant.blade.php
    }

    public function create_merchant(Request $request)
    {
        $data = [
            'title' => 'Create Merchant'
        ];
        return view('admin.pages.create_merchant', $data); //url path in folder resources/views/admin/pages/create_merchant.blade.php
    }

    public function add_merchant(Request $request)
    {
        \Log::info('add_merchant method called');
        //return $request->input(); //checking of all input fields, no storing of records executed here

        $student_id = Functions::IDGenerator(new MerchantModel, 'user_id', 5, 'MRCHNT');
        $data = $request->validate([
            'name' => 'required',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|unique:merchants',
            'username' => 'required',
            'password' => 'required|confirmed|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
            'valid_id_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
            //'password' => 'required|min:8',
            'address' => 'required',
            'profile_picture' => 'nullable',
            'valid_id_picture' => 'nullable'
        ]);


        $data['user_id'] = $student_id;
        $data['address'] = $data['address'] ?? '';
        // $data['profile_picture'] = $data['profile_picture'] ?? '';
        // $data['valid_id_picture'] = $data['valid_id_picture'] ?? '';
        $data['profile_picture'] = $request->hasFile('merchant_profile_picture') ? $request->file('merchant_profile_picture')->store('merchant_profile_pictures', 'public') : ' ';
        $data['valid_id_picture'] = $request->hasFile('merchant_valid_id_picture') ? $request->file('merchant_valid_id_picture')->store('merchant_valid_id_picture', 'public') : ' ';
        $data['user_role'] = $data['user_role'] ?? 'Merchant';
        $data['status'] = $data['status'] ?? 'For approval';
        $data['date'] = $data['date'] ?? date('Y-m-d');

        // Encrypt the password before storing it
        $data['password'] = bcrypt($data['password']);

       // dd($data);

        //$newProduct = MerchantModel::create($data);
        MerchantModel::create($data);
        $success = ['status' => 'success', 'user_id' => $student_id];
        return redirect()->route('pages.merchant', $success); //url path in folder resources/views/admin/pages/create_merchant.blade.php
    }


    public function buyer()
    {
        $data = [
            'title' => 'Buyer'
        ];
        return view('admin.pages.buyer', $data); //url path in folder resources/views/admin/pages/buyer.blade.php
    }

    public function create_vendor()
    {
        $data = [
            'title' => 'Registration'
        ];
        return view('admin.pages.create_vendor', $data);
    }
}
