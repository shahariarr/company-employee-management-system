@extends('layouts.master-user')
@section('content')
<div class="container">
    <h1>Edit Employee Profile</h1>
    <form action="{{ route('employee_profile.update', ['profile' => $profile->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{ $profile->employee_id }}" required>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $profile->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $profile->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $profile->date_of_birth }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $profile->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $profile->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $profile->contact_number }}" required>
        </div>
        <div class="form-group">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address" id="email_address" class="form-control" value="{{ $profile->email_address }}" required>
        </div>

        <!-- Job Information -->
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ $profile->job_title }}" required>
        </div>
        <div class="form-group">
            <label for="current_company_name">Current Company Name</label>
            <input type="text" name="current_company_name" id="current_company_name" class="form-control" value="{{ $profile->current_company_name }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" id="department" class="form-control" value="{{ $profile->department }}" required>
        </div>
        <div class="form-group">
            <label for="manager_supervisor">Manager/Supervisor</label>
            <input type="text" name="manager_supervisor" id="manager_supervisor" class="form-control" value="{{ $profile->manager_supervisor }}" required>
        </div>
        <div class="form-group">
            <label for="employment_start_date">Employment Start Date</label>
            <input type="date" name="employment_start_date" id="employment_start_date" class="form-control" value="{{ $profile->employment_start_date }}" required>
        </div>
        <div class="form-group">
            <label for="employment_type">Employment Type</label>
            <input type="text" name="employment_type" id="employment_type" class="form-control" value="{{ $profile->employment_type }}" required>
        </div>
        <div class="form-group">
            <label for="office_location">Office Location</label>
            <input type="text" name="office_location" id="office_location" class="form-control" value="{{ $profile->office_location }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
