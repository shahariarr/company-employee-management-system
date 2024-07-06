<!-- resources/views/company_profile/index.blade.php -->

@extends('layouts.master-company')

@section('content')
    @if ($profile)
        <div class="container">
            <h1>{{ $profile->company_name }}</h1>
            @if($profile->logo)
                <img src="{{asset('images/' .$profile->logo) }}" alt="Logo" width="70%">
            @endif
            <p><strong>Userv Id:</strong> {{ $profile->user_id }}</p>
            <p><strong>Tagline:</strong> {{ $profile->tagline }}</p>
            <p><strong>About:</strong> {{ $profile->about }}</p>
            <p><strong>Industry:</strong> {{ $profile->industry }}</p>
            <p><strong>Founded Date:</strong> {{ $profile->founded_date }}</p>
            <p><strong>Headquarters Location:</strong> {{ $profile->headquarters_location }}</p>
            <p><strong>Number of Employees:</strong> {{ $profile->number_of_employees }}</p>
            <p><strong>Website:</strong> <a href="{{ $profile->website_url }}">{{ $profile->website_url }}</a></p>
            <p><strong>Email:</strong> {{ $profile->email_address }}</p>
            <p><strong>Phone:</strong> {{ $profile->phone_number }}</p>
            <p><strong>Address:</strong> {{ $profile->address }}</p>
            <p><strong>LinkedIn:</strong> <a href="{{ $profile->linkedin }}">{{ $profile->linkedin }}</a></p>
            <p><strong>Twitter:</strong> <a href="{{ $profile->twitter }}">{{ $profile->twitter }}</a></p>
            <p><strong>Facebook:</strong> <a href="{{ $profile->facebook }}">{{ $profile->facebook }}</a></p>
            <p><strong>Overview:</strong> {{ $profile->overview }}</p>
            <p><strong>History:</strong> {{ $profile->history }}</p>
            <p><strong>Core Values:</strong> {{ $profile->core_values }}</p>
            <a href="{{ route('company_profile.edit', $profile->id) }}" class="btn btn-primary">Edit Profile</a>
        </div>
    @else
        <div class="container">
            <a href="{{ route('company_profile.create') }}" class="btn btn-primary">Create Profile</a>
        </div>
    @endif
@endsection
