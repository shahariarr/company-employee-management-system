@extends('layouts.master-user')
@section('content')
    @if ($profile)
        <div class="container">
            <h1>{{ $profile->first_name }} {{ $profile->last_name }}</h1>
            <p><strong>Employee ID:</strong> {{ $profile->employee_id }}</p>
            <p><strong>Date of Birth:</strong> {{ $profile->date_of_birth }}</p>
            <p><strong>Gender:</strong> {{ $profile->gender }}</p>
            <p><strong>Contact Number:</strong> {{ $profile->contact_number }}</p>
            <p><strong>Email Address:</strong> {{ $profile->email_address }}</p>
            <p><strong>Job Title:</strong> {{ $profile->job_title }}</p>
            <p><strong>Current Company Name:</strong> {{ $profile->current_company_name }}</p>
            <p><strong>Department:</strong> {{ $profile->department }}</p>
            <p><strong>Manager/Supervisor:</strong> {{ $profile->manager_supervisor }}</p>
            <p><strong>Employment Start Date:</strong> {{ $profile->employment_start_date }}</p>
            <p><strong>Employment Type:</strong> {{ $profile->employment_type }}</p>
            <p><strong>Office Location:</strong> {{ $profile->office_location }}</p>
            <a href="{{ route('employee_profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    @else
        <div class="container">
            <a href="{{ route('employee_profile.create') }}" class="btn btn-primary">Create Profile</a>
        </div>
    @endif
@endsection
