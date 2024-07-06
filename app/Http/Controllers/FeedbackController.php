<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $companies = Company::all();
        return view('feedback.create', compact('companies'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'feedback' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $user = Auth::user()->employee;
        // dd($user);
        if ($user === null) {

            return redirect()->route('employee_profile.create')->withErrors('Employee profile not found.');
        }
        else{
            Feedback::create([
                'employee_id' => $user->id,
                'company_id' => $request->company_id,
                'feedback' => $request->feedback,
                'rating' => $request->rating,
            ]);

            return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully.');
        }


    }
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        $companies = Company::all();
        return view('feedback.edit', compact('feedback', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'feedback' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update([
            'company_id' => $request->company_id,
            'feedback' => $request->feedback,
            'rating' => $request->rating,
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully.');
    }

    public function index()
    {
        $feedbacks = Feedback::where('employee_id', auth()->user()->employee->id)->get();
        return view('feedback.index', compact('feedbacks'));
    }
}
