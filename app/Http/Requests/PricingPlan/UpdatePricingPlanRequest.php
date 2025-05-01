<?php

namespace App\Http\Requests\PricingPlan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePricingPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
         return Auth::check() && Auth::user()->hasRole(['admin']) ;//&& $this->user_id == Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            "user_id" => 'required|exists:users,id|'.Auth::user()->id,
            'price' => 'required|numeric|min:0',
            'credit' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ];
    }
}