<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PricingPlan\StorePricingPlanRequest;
use App\Http\Requests\PricingPlan\UpdatePricingPlanRequest;

use App\Models\Course;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{


    public function index(Request $request, Course $course)
    {
        $pricingPlans = $course->pricingPlans()->get();

        return response()->json(["pricingPlan"=> $pricingPlans]);
    }

    public function store(StorePricingPlanRequest $request, Course $course)
    {
       

        $pricingPlanData = $request->validated();
        $pricingPlanData['course_id'] = $course->id;

        $pricingPlan = PricingPlan::create($pricingPlanData);

        return response()->json(["pricingPlan" => $pricingPlan]);
    }

    public function show(Course $course, PricingPlan $pricingPlan)
    {
        // Ensure pricing plan belongs to course
        if ($pricingPlan->course_id !== $course->id) {
            return response()->json(['message' => 'Pricing plan not found for this course'], 404);
        }

        return response()->json(["pricingPlan" => $pricingPlans]);
    }

    public function update(UpdatePricingPlanRequest $request, Course $course, PricingPlan $pricingPlan)
    {
        // Ensure pricing plan belongs to course
        if ($pricingPlan->course_id !== $course->id) {
            return response()->json(['message' => 'Pricing plan not found for this course'], 404);
        }

        // Check if user is admin or the course trainer
        if (!auth()->user()->hasRole('admin') && auth()->id() !== $course->trainer_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $pricingPlan->update($request->validated());

        return response()->json(["pricingPlan" => $pricingPlans]);
    }

    public function destroy(Course $course, PricingPlan $pricingPlan)
    {
        // Ensure pricing plan belongs to course
        if ($pricingPlan->course_id !== $course->id) {
            return response()->json(['message' => 'Pricing plan not found for this course'], 404);
        }

        // Check if user is admin or the course trainer
        if (!auth()->user()->hasRole('admin') && auth()->id() !== $course->trainer_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Check if pricing plan is used in any enrollments
        $hasEnrollments = $pricingPlan->enrollments()->exists();
        if ($hasEnrollments) {
            return response()->json([
                'message' => 'Cannot delete pricing plan that has active enrollments'
            ], 422);
        }

        $pricingPlan->delete();

        return response()->json(['message' => 'Pricing plan deleted successfully']);
    }
}