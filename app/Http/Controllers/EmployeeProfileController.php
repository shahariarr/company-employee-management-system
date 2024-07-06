<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeProfile;

class EmployeeProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = EmployeeProfile::where('user_id', auth()->id())->first();
        return view('employee_profile.index', compact('profile'));
    }

    public function create()
    {
        $profile = EmployeeProfile::where('user_id', auth()->id())->first();
        if ($profile !== null) {
            return view('employee_profile.index', compact('profile'));
        }else{
            return view('employee_profile.create');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|max:10',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email|unique:employee_profiles',

            'job_title' => 'required',
            'current_company_name' => 'required',
            'department' => 'required',
            'manager_supervisor' => 'required',
            'employment_start_date' => 'required|date',
            'employment_type' => 'required',
            'office_location' => 'required',
        ]);

        $data = $request->all();
        // Assuming you're using Laravel's default authentication system
        $data['user_id'] = auth()->id(); // Add the current authenticated user's ID to the data array

        EmployeeProfile::create($data);

        return redirect()->route('employee_profile.index');
    }

    public function edit()
    {
        $profile = EmployeeProfile::where('user_id', auth()->id())->first();
        return view('employee_profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = EmployeeProfile::where('user_id', auth()->id())->first();
        $request->validate([
            'employee_id' => 'required|unique:employee_profiles,employee_id,' . $profile->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email|unique:employee_profiles,email_address,' . $profile->id,

            'job_title' => 'required',
            'current_company_name' => 'required',
            'department' => 'required',
            'manager_supervisor' => 'required',
            'employment_start_date' => 'required|date',
            'employment_type' => 'required',
            'office_location' => 'required',
        ]);

        $profile->update($request->all());

        return redirect()->route('employee_profile.index');
    }
}

