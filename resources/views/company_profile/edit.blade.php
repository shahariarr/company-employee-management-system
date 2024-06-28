<!-- resources/views/company_profile/edit.blade.php -->

@extends('layouts.master-company')

@section('content')
    <div class="container">
        <form action="{{ route('company_profile.update', $companyProfile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $companyProfile->company_name }}" required>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                @if($companyProfile->logo)
                    <img src="{{ Storage::url($companyProfile->logo) }}" alt="Logo" class="mt-2">
                @endif
            </div>
            <div class="form-group">
                <label for="tagline">Tagline</label>
                <input type="text" name="tagline" id="tagline" class="form-control" value="{{ $companyProfile->tagline }}">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" class="form-control">{{ $companyProfile->about }}</textarea>
            </div>
            <div class="form-group">
                <label for="industry">Industry</label>
                <input type="text" name="industry" id="industry" class="form-control" value="{{ $companyProfile->industry }}">
            </div>
            <div class="form-group">
                <label for="founded_date">Founded Date</label>
                <input type="date" name="founded_date" id="founded_date" class="form-control" value="{{ $companyProfile->founded_date }}">
            </div>
            <div class="form-group">
                <label for="headquarters_location">Headquarters Location</label>
                <input type="text" name="headquarters_location" id="headquarters_location" class="form-control" value="{{ $companyProfile->headquarters_location }}">
            </div>
            <div class="form-group">
                <label for="number_of_employees">Number of Employees</label>
                <input type="number" name="number_of_employees" id="number_of_employees" class="form-control" value="{{ $companyProfile->number_of_employees }}">
            </div>
            <div class="form-group">
                <label for="website_url">Website URL</label>
                <input type="url" name="website_url" id="website_url" class="form-control" value="{{ $companyProfile->website_url }}">
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="email" name="email_address" id="email_address" class="form-control" value="{{ $companyProfile->email_address }}">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $companyProfile->phone_number }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $companyProfile->address }}">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $companyProfile->linkedin }}">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $companyProfile->twitter }}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $companyProfile->facebook }}">
            </div>
            <div class="form-group">
                <label for="overview">Overview</label>
                <textarea name="overview" id="overview" class="form-control">{{ $companyProfile->overview }}</textarea>
            </div>
            <div class="form-group">
                <label for="history">History</label>
                <textarea name="history" id="history" class="form-control">{{ $companyProfile->history }}</textarea>
            </div>
            <div class="form-group">
                <label for="core_values">Core Values</label>
                <textarea name="core_values" id="core_values" class="form-control">{{ $companyProfile->core_values }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
