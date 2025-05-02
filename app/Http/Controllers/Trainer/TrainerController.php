<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Course, CourseInfo};

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
        //
        return view('trainer.courses.create');
    }
 
    public function store(CreateCourseRequest $request)
    {
        try {
            // التحقق من البيانات
            $validated = $request->validated();

            // معالجة الصورة
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('courses', 'public');
                $validated['image'] = $path;
            } else {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'يرجى تحميل صورة للدورة']);
            }

            $validated['trainer_id'] = auth()->id();

            // طباعة البيانات للتصحيح
            \Log::info('Validated data:', $validated);

            // تحويل المصفوفات إلى JSON قبل حفظها
            $content = [];
            if (isset($validated['content_sections']) && is_array($validated['content_sections'])) {
                foreach ($validated['content_sections'] as $index => $sectionName) {
                    if (empty($sectionName)) continue;

                    $lessons = [];
                    if (isset($validated['lessons'][$index]) && is_array($validated['lessons'][$index])) {
                        foreach ($validated['lessons'][$index] as $lessonTitle) {
                            if (!empty($lessonTitle)) {
                                $lessons[] = $lessonTitle;
                            }
                        }
                    }

                    $content[] = [
                        'title' => $sectionName,
                        'lessons' => $lessons
                    ];
                }
            }

            // إنشاء الدورة
            $course = Course::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'image' => $validated['image'],
                'trainer_id' => $validated['trainer_id'],
                'pricing' => $validated['price'], // تأكد من أن هذا السطر موجود
                'status' => $validated['status'],
            ]);

            // تجهيز بيانات الأهداف
            $objectives = [];
            if (isset($validated['objectives']) && is_array($validated['objectives'])) {
                foreach ($validated['objectives'] as $objective) {
                    if (!empty($objective)) {
                        $objectives[] = $objective;
                    }
                }
            }

            if (empty($objectives)) {
                $objectives[] = 'لم يتم تحديد أهداف للدورة';
            }

            // تجهيز بيانات المشاريع
            $projects = [];
            if (isset($validated['project_titles']) && is_array($validated['project_titles'])) {
                foreach ($validated['project_titles'] as $index => $projectTitle) {
                    if (empty($projectTitle)) continue;

                    $details = [];
                    if (isset($validated['project_details'][$index]) && is_array($validated['project_details'][$index])) {
                        foreach ($validated['project_details'][$index] as $detail) {
                            if (!empty($detail)) {
                                $details[] = $detail;
                            }
                        }
                    }

                    $projects[$projectTitle] = $details;
                }
            }

            // تحويل المصفوفات إلى JSON
            $contentJson = json_encode($content);
            $objectivesJson = json_encode($objectives);
            $projectsJson = json_encode($projects);

            // إنشاء معلومات الدورة
            CourseInfo::create([
                'course_id' => $course->id,
                'about' => $validated['about'] ?? $validated['description'],
                'content' => $contentJson,
                'objectives' => $objectivesJson,
                'projects' => $projectsJson,
            ]);

            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('trainer.index')
                ->with('success', 'تم إنشاء الدورة بنجاح');

        } catch (\Exception $e) {
            // تسجيل الخطأ
            \Log::error('Error creating course: ' . $e->getMessage());
            
            // إعادة التوجيه مع رسالة خطأ
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إنشاء الدورة: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

