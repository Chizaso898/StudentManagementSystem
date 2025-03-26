<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller {
    public function index() {
        $courses = Course::where('instructor_id', Auth::id())->get();
        return view('courses.index', compact('courses'));
    }

    public function create() {
        return view('courses.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:courses'
        ]);

        Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'instructor_id' => Auth::id()
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created!');
    }

    public function show(Course $course) {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course) {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course) {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:courses,code,' . $course->id
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated!');
    }

    public function destroy(Course $course) {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted!');
    }
}
