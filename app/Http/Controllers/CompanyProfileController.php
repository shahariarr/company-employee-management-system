<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $profile = Company::where('user_id', auth()->id())->first();
        return view('company_profile.index', compact('profile'));
    }

    public function create()
    {
        return view('company_profile.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'tagline' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters_location' => 'nullable|string|max:255',
            'number_of_employees' => 'nullable|integer',
            'website_url' => 'nullable|url|max:255',
            'email_address' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'overview' => 'nullable|string',
            'history' => 'nullable|string',
            'core_values' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $fileNameToStore = 'post_image_' . md5((uniqid())) . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $fileNameToStore);
        }

        // Add the current user's ID to the data array
        $data['user_id'] = auth()->id();

        Company::create($data);

        return redirect()->route('company_profile.index');
    }

    public function edit(Company $companyProfile)
    {
        return view('company_profile.edit', compact('companyProfile'));
    }

    public function update(Request $request, Company $companyProfile)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'tagline' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'founded_date' => 'nullable|date',
            'headquarters_location' => 'nullable|string|max:255',
            'number_of_employees' => 'nullable|integer',
            'website_url' => 'nullable|url|max:255',
            'email_address' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'overview' => 'nullable|string',
            'history' => 'nullable|string',
            'core_values' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $fileNameToStore = 'post_image_' . md5((uniqid())) . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $fileNameToStore);

            $companyProfile->update($data);

            return redirect()->route('company_profile.index');
        }
    }
}
