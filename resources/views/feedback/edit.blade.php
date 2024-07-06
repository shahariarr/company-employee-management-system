@extends('layouts.master-user')

@section('content')
    <div class="container">
        <h1>Edit Feedback</h1>
        <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="company_id">Select Company</label>
                <select name="company_id" id="company_id" class="form-control" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $feedback->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ $feedback->rating }}" required>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" id="feedback" class="form-control" rows="4" required>{{ $feedback->feedback }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Feedback</button>
        </form>
    </div>
@endsection
