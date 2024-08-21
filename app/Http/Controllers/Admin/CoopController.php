<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_Data\CoopModel;
use Illuminate\Http\Request;
use App\Helpers\Functions;
use App\Helpers\ImageResizer;

class CoopController extends Controller
{

    public function add_coop(Request $request)
    {
        \Log::info($request->all());
        $validatedData = $request->validate([
            'user_id' => 'nullable',
            'authorized_representative' => 'required|string|max:255',
            'coop_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:11',
            'email' => 'required|email|max:255',
            'coop_profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
            'cendor_valid_id_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:512',
            'username' => 'required|string|max:255|unique:coop',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',     // at least one lowercase letter
                'regex:/[A-Z]/',     // at least one uppercase letter
                'regex:/[0-9]/',     // at least one digit
                'regex:/[@$!%*?&]/'  // at least one special character
            ],
            'password_confirmation' => 'nullable|string|min:8',
            'agency_affiliation' => 'required|string|max:255',
            'agency_affiliation_name' => [
                'nullable',
                'required_if:agency_affiliation,yes'
            ],
            'user_role' => 'nullable|string|max:255',
            'approved_by' => 'nullable|string|max:255',
            'date' => 'nullable|date'
        ]);

        // $latestCoop = CoopModel::orderBy('id', 'desc')->first();
        // $nextId = $latestCoop ? $latestCoop->id + 1 : 1;
        // $formattedId = 'VNDR-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);


        $data = $validatedData;
        $data['user_id'] = Functions::IDGenerator(new CoopModel, 'user_id', 5, 'VNDR');
        $data['user_role'] = $data['user_role'] ?? 'Coop';
        $data['date'] = $data['date'] ?? date('Y-m-d');
        $data['status'] = $data['status'] ?? 'For approval';
        //$data['profile_picture'] = $data['profile_picture'] ?? '';
        //$data['valid_id_picture'] = $data['valid_id_picture'] ?? '';
        // $data['profile_picture'] = $request->hasFile('coop_profile_picture') ? $request->file('coop_profile_picture')->store('coop_profile_picture', 'public') : null;
        // $data['valid_id_picture'] = $request->hasFile('coop_valid_id_picture') ? $request->file('coop_valid_id_picture')->store('coop_valid_id_picture', 'public') : null;
        $data['approved_by'] = $data['approved_by'] ?? '';


        if ($request->hasFile('coop_profile_picture')) {
            $data['profile_picture'] = ImageResizer::resizeAndSaveImage($request->file('coop_profile_picture'), 'coop_profile_picture');
        }

        // Handle and resize valid ID picture
        if ($request->hasFile('coop_valid_id_picture')) {
            $data['valid_id_picture'] = ImageResizer::resizeAndSaveImage($request->file('coop_valid_id_picture'), 'coop_valid_id_picture');
        }

        //encryp password before storing to database
        $data['password'] = bcrypt($data['password']);

        //dd($data);

        try {
            CoopModel::create($data);

            $success = ['status' => 'success', 'user_id' => $data['user_id']];
            return redirect()->route('pages.coop', $success);
        } catch (\Exception $e) {
            $error = ['status' => 'error', 'user_id' => $data['user_id']];
            return redirect()->route('create.coop', $error);
        }
    }
}
