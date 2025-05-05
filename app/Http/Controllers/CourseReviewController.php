<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Enrollment, Review, Course};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CourseReviewController extends Controller
{
    //
    public function store(Request $request, Course $course)
    {
        // التحقق من وجود الـ enrollment

        $course = Course::findOrFail($course->id);

        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        // إنشاء أو تحديث التقييم
        $rating = Review::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'course_id' => $course->id,
                'rating' => $validated['rating'],

            ],

        );

        return response()->json([
            'success' => true,
            'message' => 'Rating submitted successfully',
            'r' => $rating,
        ]);
    }
}
