<?php

namespace App\Http\Controllers;

use App\Models\Admin;

class UserController extends Controller
{
    public function index()
    {
        $admin = User::paginate();

        return view('admin.index', compact('admin'));
    }
}
