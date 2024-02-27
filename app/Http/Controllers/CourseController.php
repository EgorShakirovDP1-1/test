<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'descriprion' => 'required|string|max:255',
            'banner_url' => 'required',
            'participant_count' => 'required|integer|min:0',

        ]);

        $course = Course::create($validated);
        return response()->json(['message' => 'Course created successfully', 'data' => $course], 201);

    }
    public function index()
    {
        $courses = Course::all();
        return response()->json(['data' =>$courses], 200);
    }
}
