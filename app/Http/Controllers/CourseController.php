<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{


    public function index(Request $request)
    {
        $query = Course::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by price range
        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        $courses = $query->with('trainer')
                        ->orderBy('created_at', 'desc')
                        ->paginate(8);

        return view('courses', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('trainer');
        $isEnrolled = false;

        if (Auth::check()) {
            $isEnrolled = Enrollment::where('user_id', Auth::id())
                                  ->where('course_id', $course->id)
                                  ->exists();
        }

        return view('courses.show', compact('course', 'isEnrolled'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:Opened,Coming Soon,Archived',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $validated['image'] = $path;
        }

        $validated['trainer_id'] = Auth::id();

        $course = Course::create($validated);

        return redirect()->route('courses.show', $course)
                        ->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:Opened,Coming Soon,Archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $path = $request->file('image')->store('courses', 'public');
            $validated['image'] = $path;
        }

        $course->update($validated);

        return redirect()->route('courses.show', $course)
                        ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        // Delete course image
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('courses.index')
                        ->with('success', 'Course deleted successfully.');
    }

    public function enroll(Course $course)
    {
        if (Enrollment::where('user_id', Auth::id())
                     ->where('course_id', $course->id)
                     ->exists()) {
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
