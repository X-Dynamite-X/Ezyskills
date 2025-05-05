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
        $courses = Enrollment::where('user_id', $this->user->id)->with('course')->paginate(8);
        return view("student.index", compact('courses'));
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment = Enrollment::findOrFail($enrollment->id);
        if ($this->user->id !== $enrollment->user_id) {
            return redirect()->route('courses');
        }
        return view("student.show", compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $course = Course::findOrFail($course->id);
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
        //  event(new EnrollUserInCourseNotificationEvent("Your course has been purchased from this user. " . $this->user->email, $course->trainer->id));

        $course->trainer->notify(new EnrollUserInCourseNotification("Your course has been purchased from this user. " . $this->user->email));

        if ($this->isAuth && $this->user->credit > 0) {
            $this->user->credit -= 1;
            $this->user->save();
            Enrollment::create([
                'user_id' => $this->user->id,
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
            'user_id' => $this->user->id,
            'course_id' => $course->id,
            'usePlan' => false,
            'enrolled_at' => now(),
        ]);

        if($request->ajax()){
                return response()->json([
                    'message' => 'You have successfully enrolled in the course',

                'redirect' => redirect()->intended('/student')->getTargetUrl()
                ]);
        }

        return redirect()->route('student.show', $course->id);
    }
}