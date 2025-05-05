<?php

namespace App\Http\Controllers;

use App\Events\EnrollUserInCourseNotificationEvent;
use App\Notifications\EnrollUserInCourseNotification;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Enrollment::where('user_id', Auth::user()->id)->with('course')->paginate(8);
        return view("student.index", compact('courses'));
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment = Enrollment::findOrFail($enrollment->id);
        $user = Auth::user();


        if ($user->id !== $enrollment->user_id) {
            return redirect()->route('courses');
        }

        // $rating = $user->courseRatings()
        //     ->where('course_id', $enrollment->course_id)
        //     ->first()->rating ?? 0;
        $rating = $enrollment->user->courseRatings->where('course_id', $enrollment->course_id)->first()->rating ?? 0;
// dd($rating);
        return view("student.show", compact('enrollment', "rating"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $course = Course::findOrFail($course->id);
        if ($course->user_id == Auth::user()->id) {
            return redirect()->back()->with('error', 'You cannot enroll in your own course.');
        }
        $alreadyEnrolled = Enrollment::where('user_id', Auth::user()->id)
            ->where('course_id', $course->id)
            ->exists();
        if ($alreadyEnrolled) {
            return redirect()->route('courses.show', $course->id)
                ->with('info', 'You are already enrolled in this course.');
        }
        //  event(new EnrollUserInCourseNotificationEvent("Your course has been purchased from this user. " . Auth::user()->email, $course->trainer->id));

        $course->trainer->notify(new EnrollUserInCourseNotification("Your course has been purchased from this user. " . Auth::user()->email));

        if (Auth::check() && Auth::user()->credit > 0) {
            Auth::user()->credit -= 1;
            Auth::user()->save();
            Enrollment::create([
                'user_id' => Auth::user()->id,
                'course_id' => $course->id,
                'usePlan' => true,
                'enrolled_at' => now(),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'message' => 'You have successfully enrolled in the course',
                    // 'redirect' => route('student.show', $course->id),
                    'redirect' => redirect()->intended('/student')->getTargetUrl()
                ]);
            }
            return redirect()->route('courses.show', $course->id);
        }
        Enrollment::create([
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'usePlan' => false,
            'enrolled_at' => now(),
        ]);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'You have successfully enrolled in the course',

                'redirect' => redirect()->intended('/student')->getTargetUrl()
            ]);
        }

        return redirect()->route('student.show', $course->id);
    }
}
