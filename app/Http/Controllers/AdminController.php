<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allCompanyProfile()
    {
        $companyProfiles = Company::latest()->get();
        return view('admin.all_company', compact('companyProfiles'));
    }

    public function allEmployeeProfile()
    {
        $employeeProfiles = EmployeeProfile::latest()->get();
        return view('admin.all_employee', compact('employeeProfiles'));
    }
}
