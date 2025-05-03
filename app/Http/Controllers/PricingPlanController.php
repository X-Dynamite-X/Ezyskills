<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingPlan\StorePricingPlanRequest;
use App\Http\Requests\PricingPlan\UpdatePricingPlanRequest;

use App\Models\Course;
use App\Models\PricingPlan;
use App\Models\PricingPlanUser;
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
        $existingSubscription = PricingPlanUser::where('user_id', $this->auth->id)
            ->where('plane_id', $pricingPlan->id)
            ->first();

        if ($existingSubscription) {
            $existingSubscription->subscription_number += 1;
            $existingSubscription->subscribed_at = now(); 
            $existingSubscription->save();
        } else {
            PricingPlanUser::create([
                'user_id' => $this->auth->id,
                'plane_id' => $pricingPlan->id,
                'subscription_number' => 1,
                'subscribed_at' => now(),
            ]);
        }
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