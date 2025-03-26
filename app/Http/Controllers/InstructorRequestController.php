<?php

namespace App\Http\Controllers;

use App\Models\InstructorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructorRequestController extends Controller
{
    public function create()
    {
        return view('instructor.request');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructor_requests,email',
            'expertise' => 'required|string|max:255',
            'additional_info' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        InstructorRequest::create($request->all());

        return redirect()->route('instructor.request')->with('success', 'Request submitted successfully! You will be notified upon approval.');
    }
}
