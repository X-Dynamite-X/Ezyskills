<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingPlan\StorePricingPlanRequest;
use App\Http\Requests\PricingPlan\UpdatePricingPlanRequest;

use App\Models\Course;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingPlanController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    public function index(Request $request)
    {

        $pricingPlans = PricingPlan::all();
        return view('pricing', compact('pricingPlans'));
    }

    public function store(StorePricingPlanRequest $request, Course $course)
    {


        $pricingPlanData = $request->validated();
        $pricingPlanData['course_id'] = $course->id;

        $pricingPlan = PricingPlan::create($pricingPlanData);

        return response()->json(["pricingPlan" => $pricingPlan]);
    }


    public function update(UpdatePricingPlanRequest $request,  PricingPlan $pricingPlan)
    {


        // Check if user is admin or the course trainer

        $pricingPlan->update($request->validated());

        return response()->json(["pricingPlan" => $pricingPlan]);
    }

    public function destroy(PricingPlan $pricingPlan)
    {

        PricingPlan::findOrFail($pricingPlan->id)->delete();
        return response()->json(['message' => 'Pricing plan deleted successfully']);
    }
    public function bayCredit(Request $request, PricingPlan $pricingPlan)
    {
        $pricingPlan = PricingPlan::findOrFail($pricingPlan->id);

        if (Auth::check()) {
            $this->auth->credit += $pricingPlan->credit;
            $this->auth->save();
            return response()->json(['redirect' => route('courses')]);
        }
        return response()->json(["error" => "You are not logged in"], 401);
    }
}