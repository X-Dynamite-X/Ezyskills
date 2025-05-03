<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{




    public function index(Request $request)
    {
        $query = Course::query();

        // Search functionality
        if ($request->ajax()) {
            if ($request->has('search')) {
                $search = $request->get('search');
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            }

            // Filter by status
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }
            $courses = $query->with('trainer')
                ->orderBy('created_at', 'desc')
                ->paginate(8);

            return response()->json([
                'courses' => view('courses.getCourses', compact('courses'))->render(),
                'pagination' => $courses->links()->render(),
            ]);
        }
        $courses = $query->with('trainer')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('courses', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('trainer', 'courseInfo');
        $isEnrolled = false;

        if (Auth::check()) {
        $isEnrolled = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();
        }
        return view('courses.show', compact('course', 'isEnrolled',));
    }

    public function enroll(Course $course)
    {
        if (Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists()
        ) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'status' => 'active',
            'progress' => 0
        ]);

        return back()->with('success', 'Successfully enrolled in the course.');
    }

    public function myCourses()
    {
        $enrolledCourses = Auth::user()
            ->enrollments()
            ->with('course.trainer')
            ->paginate(12);

        return view('courses.my-courses', compact('enrolledCourses'));
    }
}