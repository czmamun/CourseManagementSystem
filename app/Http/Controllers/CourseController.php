<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course; // Importing the Course model

class CourseController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'course' => 'required|string',
        ]);

        // Logic to register the user for the selected course
        Course::create([
            'name' => $request->course,
            'description' => 'Course description here', // Placeholder for description
        ]);

        return redirect()->route('dashboard.student')->with('success', 'You have successfully registered for the course.');
    }
}
