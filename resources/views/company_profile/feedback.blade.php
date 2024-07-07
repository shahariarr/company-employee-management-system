@extends('layouts.master-admin')
@section('content')
    <div class="container">
        <h1>Feedback for {{ $company->company_name }}</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company->feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->employee->first_name }} {{ $feedback->employee->last_name }}</td>
                            <td>{{ $feedback->rating }}</td>
                            <td>{{ $feedback->feedback }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
