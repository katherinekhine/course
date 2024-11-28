<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function register(Course $course)
    {
        $course->students()->attach(Auth::id());
        return redirect(route('courses.index'));
    }

    public function unregister(Course $course)
    {
        $course->students()->detach(Auth::id());
        return redirect(route('courses.index'));
    }
}
