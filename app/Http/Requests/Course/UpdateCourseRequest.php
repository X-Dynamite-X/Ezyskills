<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('trainer') && auth()->user()->id == $this->route('course')->trainer_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'about' => 'nullable|string',
            'pricing' => 'required|numeric|min:0',
            'status' => 'required|in:Opened,Coming Soon,Archived',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'objectives' => 'nullable|array',
            'objectives.*' => 'nullable|string',
            'content_sections' => 'nullable|array',
            'content_sections.*' => 'nullable|string',
            'lessons' => 'nullable|array',
            'lessons.*' => 'nullable|array',
            'lessons.*.*' => 'nullable|string',
            'project_titles' => 'nullable|array',
            'project_titles.*' => 'nullable|string',
            'project_details' => 'nullable|array',
            'project_details.*' => 'nullable|array',
            'project_details.*.*' => 'nullable|string',
            'content_json' => 'nullable|json',
            'projects_json' => 'nullable|json',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     *
     * 
     */
    protected function prepareForValidation()
    {
         if ($this->has('content_json') && is_string($this->content_json)) {
            $content = json_decode($this->content_json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->merge(['content_json' => '{}']);
            }
        }

        if ($this->has('projects_json') && is_string($this->projects_json)) {
            $projects = json_decode($this->projects_json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->merge(['projects_json' => '{}']);
            }
        }
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The course title is required.',
            'title.max' => 'The course title must not exceed 255 characters.',
            'description.required' => 'The course description is required.',
            'pricing.required' => 'The course pricing is required.',
            'pricing.numeric' => 'The course pricing must be a number.',
            'pricing.min' => 'The course pricing must be 0 or more.',
            'status.required' => 'The course status is required.',
            'status.in' => 'The course status must be one of the available values.',
            'image.required' => 'The course image is required.',
            'image.image' => 'The attached file must be an image.',
            'image.mimes' => 'The image must be in jpeg, png, or jpg format.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'Course Title',
            'description' => 'Course Description',
            'about' => 'Course Details',
            'pricing' => 'Course pricing',
            'status' => 'Course Status',
            'image' => 'Course Image',
            'objectives' => 'Course Objectives',
            'content_sections' => 'Content Sections',
            'lessons' => 'Lessons',
            'project_titles' => 'Project Titles',
            'project_details' => 'Project Details',
        ];
    }
}
