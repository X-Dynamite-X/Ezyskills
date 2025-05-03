<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $user, $isAuth;
    public function __construct()
    {
        $this->user = Auth::user();
        $this->isAuth = Auth::check();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Enrollment::where('user_id', $this->user->id)->with('course')->paginate(12);

        return view("student.index", compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Enrollment $enrollment)
    {
        if ($this->user->id !== $enrollment->user_id) {
            return redirect()->route('courses.show', $enrollment->course_id);
        }
        $enrollment = Enrollment::findOrFail($enrollment->id);
        return view("student.show", compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        if ($course->user_id == $this->user->id) {
            return redirect()->back()->with('error', 'You cannot enroll in your own course.');
        }
        $alreadyEnrolled = Enrollment::where('user_id', $this->user->id)
            ->where('course_id', $course->id)
            ->exists();
        if ($alreadyEnrolled) {
            return redirect()->route('courses.show', $course->id)
                ->with('info', 'You are already enrolled in this course.');
        }
        if ($this->isAuth && $this->user->credit > 0) {
            $this->user->credit -= 1;
            $this->user->save();
            Enrollment::create([
                'user_id' => $this->user->id,
                'course_id' => $course->id,
                'usePlan' => true,
                'enrolled_at' => now(),
            ]);
            return redirect()->route('courses.show', $course->id);
        }
        Enrollment::create([
            'user_id' => $this->user->id,
            'course_id' => $course->id,
            'usePlan' => false,
            'enrolled_at' => now(),
        ]);


        return redirect()->route('courses.show', $course->id);
    }
}
