@extends('layouts.master-user')

@section('content')
    <div class="container">
        <h1>Your Feedbacks</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('feedback.create') }}" class="btn btn-primary mb-3">Submit New Feedback</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th>Company</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->company->company_name}}</td>
                        <td>{{ $feedback->rating }}</td>
                        <td>{{ $feedback->feedback }}</td>
                        <td>
                            <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;">
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
