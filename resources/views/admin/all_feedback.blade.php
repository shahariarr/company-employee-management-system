@extends('layouts.master-admin')
@section('content')
    <div class="container">
        <h1>All Feedback</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Company Name</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->employee->first_name }} {{ $feedback->employee->last_name }}</td>
                            <td>{{ $feedback->company->company_name }}</td>
                            <td>{{ $feedback->rating }}</td>
                            <td>{{ $feedback->feedback }}</td>
                            <td>
                                <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
