<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PricingPlanController extends Controller
{
    public function index()
    {
        $pricingPlans = PricingPlan::paginate(9);
        return view('admin.pricing.index', compact('pricingPlans'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'pricing' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'credit' => 'required|integer|min:1',
            'features' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $data = $validator->validated();
        $data['user_id'] = Auth::id();

        $pricingPlan = PricingPlan::create($data);

        if ($request->ajax()) {

            $pricingPlanView = view("admin.pricing.planCard", ['plan' => $pricingPlan])->render();

            // Return the pricing plan data as JSON
            return response()->json([
                'success' => true,
                'message' => 'Pricing plan created successfully',
                'pricingPlan' => $pricingPlanView,

            ]);
        }

        return redirect()->route('admin.pricing.index ')
            ->with('success', 'Pricing plan created successfully');
    }
    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $pricingPlan = PricingPlan::findOrFail($pricingPlan->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'pricing' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'credit' => 'required|integer|min:1',
            'features' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $pricingPlan->update([
            'name' => $request->name,
            'pricing' => $request->price,
            'description' => $request->description,
            'credit' => $request->credit,
            'features' => $request->features,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pricing plan updated successfully',
                'pricingPlan' => $pricingPlan
            ]);
        }

        return redirect()->route('admin.pricing.index')
            ->with('success', 'Pricing plan updated successfully');
    }
    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pricing plan deleted successfully'
            ]);
        }

        return redirect()->route('admin.pricing.index')
            ->with('success', 'Pricing plan deleted successfully');
    }
}