@extends('layouts.master-user')
@push('styles')
    {{-- <style>
        .form-control {
            height: 45px;
            border: 1px solid #DCDFE8;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        /* Add more custom styles here */
    </style> --}}
@endpush
@section('content')
    <div class="container">
        <h1>Submit Feedback</h1>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company_id">Select Company</label>
                <select name="company_id" id="company_id" class="form-control js-example-responsive" required
                    style="height: 45px; border: 1px solid #DCDFE8; -webkit-border-radius: 10px; border-radius: 10px;">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}"
                            {{ $company->id == 'your_default_company_id' ? 'selected' : '' }}>{{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5"
                    required>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" id="feedback" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".js-example-responsive").select2({
                width: 'resolve'

            });
            var defaultValue = 'your_default_value'; // set your default value here
            $(".js-example-responsive").val(defaultValue).trigger('change');
        });
    </script>
@endpush
