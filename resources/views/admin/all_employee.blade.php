@extends('layouts.master-admin')
@section('content')
<h1>All Employee Profiles</h1>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Created At</th>
                    <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employeeProfiles as $profile)
                <tr>
                    <td>{{ $profile->employee_id }}</td>
                    <td>{{ $profile->first_name }} {{ $profile->last_name }}</td>
                    <td>{{ $profile->created_at }}</td>
                    <td>{{ $profile->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
