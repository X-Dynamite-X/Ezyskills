<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Enrollment, Review, Course};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CourseReviewController extends Controller
{
    //
    public function store(Request $request, Enrollment $enrollment)
    {
      
            // Find the enrollment
            $enrollment = Enrollment::findOrFail($enrollment->id);

           
         

            // Validate the rating
            $validated = $request->validate([
                'rating' => 'required|integer|between:1,5',
             ]);

            // Create or update the rating
            $enrollment->course->ratings()->updateOrCreate(
                ['user_id' => auth()->id()],
                ['rating' => $validated['rating']]
            );

  
            return response()->json([
                'success' => true,
                'message' => 'Rating submitted successfully',
                'average_rating' => $enrollment->course->average_rating,
                'ratings_count' => $enrollment->course->ratings_count
            ]);
 
    }
    public function update(Request $request, Review $review)
    {
        // التحقق من أن التقييم يعود للمستخدم الحالي
        if ($review->user_id != Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا التقييم');
        }

        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // تحديث التقييم
        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);


        return redirect()->route('student.courses.show', $review->course)
            ->with('success', 'تم تحديث تقييمك بنجاح!');
    }

}