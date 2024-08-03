<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('User.Home', compact('courses'));
    }
   

    public function show($id)
    {
        $course = Course::with('videos')->findOrFail($id);
        return view('User.all_videos', compact('course'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('title', 'LIKE', "%{$query}%")->get();

        return response()->json($courses);
    }
}
