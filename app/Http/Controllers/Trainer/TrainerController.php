<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\{CreateCourseRequest, UpdateCourseRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Course, CourseInfo};
use App\Events\UpdateCourseNotificationEvent;
use App\Notifications\UpdateCourseNotification;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    public function index(Request $request)
    {
        //

        if ($request->ajax()) {

            $search = $request->input('search');
            $status = $request->input('status');
            $courses = $this->auth->courses()->when($search, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })->when($status, function ($query, $status) {
                $query->where('status', $status);
            })->paginate(10);
            $courses->appends(['search' => $search, 'status' => $status]);

            return response()->json([
                'courses' => view('trainer.table', compact('courses'))->render(),
                'pagination' => $courses->links()->render(),
            ]);
        }
        $courses = $this->auth->courses()->paginate(10);
        return view("trainer.index", compact('courses'));
    }

    public function create()
    {
        return view('trainer.courses.create');
    }

    public function store(CreateCourseRequest $request)
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('courses', 'public');
                $validated['image'] = $path;
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => ['image' => 'Please upload a course image']
                ], 422);
            }
            $validated['trainer_id'] = auth()->id();

            $objectives = [];
            if ($request->has('objectives_json')) {
                $objectives = json_decode($request->input('objectives_json'), true) ?? [];
            } else {
                $objectives = array_filter($request->input('objectives', []), function ($objective) {
                    return !empty($objective);
                });
            }


            $content = [];
            if ($request->has('content_json')) {
                $content = json_decode($request->input('content_json'), true) ?? [];
            } else {

                $contentSections = $request->input('content_sections', []);
                $lessons = $request->input('lessons', []);

                foreach ($contentSections as $index => $sectionName) {
                    if (empty($sectionName)) continue;

                    $sectionLessons = $lessons[$index] ?? [];
                    $content[$sectionName] = array_filter($sectionLessons, function ($lesson) {
                        return !empty($lesson);
                    });
                }
            }


            $projects = [];
            if ($request->has('projects_json')) {
                $projects = json_decode($request->input('projects_json'), true) ?? [];
            } else {
                // Process data from traditional form
                $projectTitles = $request->input('project_titles', []);
                $projectDetails = $request->input('project_details', []);

                foreach ($projectTitles as $index => $title) {
                    if (empty($title)) continue;

                    $details = $projectDetails[$index] ?? [];
                    $projects[$title] = array_filter($details, function ($detail) {
                        return !empty($detail);
                    });
                }
            }
            $course = Course::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'image' => $validated['image'],
                'trainer_id' => $validated['trainer_id'],
                'pricing' => $validated['pricing'],
                'status' => $validated['status'],
            ]);
            // Create course info
            CourseInfo::create([
                'course_id' => $course->id,
                'about' => $validated['about'] ?? $validated['description'],
                'content' => $content,
                'objectives' => $objectives,
                'projects' => $projects,
            ]);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Course created successfully',

                // 'redirect' =>  redirect()->route('courses.show', $course->id),
                'redirect' =>             redirect()->route('courses.show', $course->id),
                'course' => $course,
            ]);
        } catch (\Exception $e) {
            // Log error
            \Log::error('Error creating course: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the course: ' . $e->getMessage()
            ], status: 500);
        }
    }


    public function edit(Course $course)
    {
        $course = Course::findOrFail($course->id);

        // Check if the logged-in trainer owns this c->ourse
        if ($course->trainer_id !== auth()->id()) {
            return redirect()->route('trainer.index')->with('error', 'You are not authorized to edit this course.');
        }

        return view('trainer.courses.edit', compact('course'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {

        $course = Course::findOrFail($course->id);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $validated['image'] = $path;
        } else {
            return response()->json([
                'success' => false,
                'errors' => ['image' => 'Please upload a course image']
            ], 422);
        }
        $validated['trainer_id'] = auth()->id();

        $objectives = [];
        if ($request->has('objectives_json')) {
            $objectives = json_decode($request->input('objectives_json'), true) ?? [];
        } else {
            $objectives = array_filter($request->input('objectives', []), function ($objective) {
                return !empty($objective);
            });
        }


        $content = [];
        if ($request->has('content_json')) {
            $content = json_decode($request->input('content_json'), true) ?? [];
        } else {

            $contentSections = $request->input('content_sections', []);
            $lessons = $request->input('lessons', []);

            foreach ($contentSections as $index => $sectionName) {
                if (empty($sectionName)) continue;

                $sectionLessons = $lessons[$index] ?? [];
                $content[$sectionName] = array_filter($sectionLessons, function ($lesson) {
                    return !empty($lesson);
                });
            }
        }


        $projects = [];
        if ($request->has('projects_json')) {
            $projects = json_decode($request->input('projects_json'), true) ?? [];
        } else {
            // Process data from traditional form
            $projectTitles = $request->input('project_titles', []);
            $projectDetails = $request->input('project_details', []);

            foreach ($projectTitles as $index => $title) {
                if (empty($title)) continue;

                $details = $projectDetails[$index] ?? [];
                $projects[$title] = array_filter($details, function ($detail) {
                    return !empty($detail);
                });
            }
        }
        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'trainer_id' => $validated['trainer_id'],
            'pricing' => $validated['pricing'],
            'status' => $validated['status'],
        ]);
        // Create course info
        $course->courseInfo()->update([
            'course_id' => $course->id,
            'about' => $validated['about'] ?? $validated['description'],
            'content' => $content,
            'objectives' => $objectives,
            'projects' => $projects,
        ]);
        // event(new UpdateCourseNotificationEvent("Your course has been updated from Trainers " . $this->auth->email, 2));
        $course->notify(new UpdateCourseNotification(
            "The course \"{$course->title}\" has been updated by the trainer {$course->trainer->email}."
        ));

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'redirect' =>  redirect()->route('courses.show', $course->id),
            'course' => $course
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
