@extends('layouts.app')

@section('title', 'Create New Course')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<style>
    .step-content {
        display: none;
    }
    .step-content.active {
        display: block;
    }
    .error-message {
        color: #e53e3e;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .step-indicator {
        width: 2rem;
        height: 2rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e2e8f0;
        color: #4a5568;
    }
    .step-indicator.active {
        background-color: #FF914C;
        color: white;
    }
    .step-indicator.completed {
        background-color: #48bb78;
        color: white;
    }
</style>
@endsection

@section('main')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Create New Course</h1>
            <p class="text-gray-600">Fill in the details to create a new course for your students.</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Step Indicators -->
        <div class="flex justify-between mb-8 relative">
            <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0"></div>
            
            <div class="flex flex-col items-center relative z-10">
                <div id="step1-indicator" class="step-indicator active">1</div>
                <span class="text-sm mt-2">Basic Info</span>
            </div>
            
            <div class="flex flex-col items-center relative z-10">
                <div id="step2-indicator" class="step-indicator">2</div>
                <span class="text-sm mt-2">Objectives</span>
            </div>
            
            <div class="flex flex-col items-center relative z-10">
                <div id="step3-indicator" class="step-indicator">3</div>
                <span class="text-sm mt-2">Content</span>
            </div>
            
            <div class="flex flex-col items-center relative z-10">
                <div id="step4-indicator" class="step-indicator">4</div>
                <span class="text-sm mt-2">Projects</span>
            </div>
        </div>

        <form id="course-form" method="POST" action="{{ route('trainer.store') }}" enctype="multipart/form-data"
            class="bg-white rounded-lg shadow-md overflow-hidden">
            @csrf
            
            <!-- Step 1: Basic Information -->
            <div id="step1" class="step-content active p-6">
                <h2 class="text-xl font-semibold mb-6">Basic Course Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Course Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full px-4 py-2 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Angular JS Fundamentals" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="Brief description of your course" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="pricing" class="block text-sm font-medium text-gray-700 mb-1">pricing ($)</label>
                        <input type="number" name="pricing" id="prpricingice" min="0" step="0.01"
                            class="w-full px-4 py-2 border @error('pricing') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. 29.99" value="{{ old('pricing') }}" required>
                        @error('pricing')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status"
                            class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            required>
                            <option value="">Select status</option>
                            <option value="Opened" {{ old('status') == 'Opened' ? 'selected' : '' }}>Opened</option>
                            <option value="Coming Soon" {{ old('status') == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                            <option value="Archived" {{ old('status') == 'Archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="col-span-2">
                        <label for="about" class="block text-sm font-medium text-gray-700 mb-1">Detailed Description (About)</label>
                        <textarea name="about" id="about" rows="5"
                            class="w-full px-4 py-2 border @error('about') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="Detailed description of your course">{{ old('about') }}</textarea>
                        @error('about')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Course Image</label>
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg"
                                    class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]">
                                @error('image')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div id="image-preview" class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400 text-xs text-center">Preview</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end">
                    <button type="button" id="step1-next"
                        class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                        Next: Objectives
                    </button>
                </div>
            </div>
            
            <!-- Step 2: Objectives -->
            <div id="step2" class="step-content p-6">
                <h2 class="text-xl font-semibold mb-6">Course Objectives</h2>
                <p class="text-gray-600 mb-4">What will students learn in this course? Add at least 3 objectives.</p>
                
                <div id="objectives-container">
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Learn the fundamentals of Angular.js">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Build real-world applications with Angular.js">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="objective-item flex items-center mb-3">
                        <input type="text" name="objectives[]"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                            placeholder="e.g. Master advanced Angular.js concepts">
                        <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <button type="button" id="add-objective"
                    class="mt-3 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Objective
                </button>
                
                <div class="mt-8 flex justify-between">
                    <button type="button" id="step2-prev"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Previous
                    </button>
                    <button type="button" id="step2-next"
                        class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                        Next: Content
                    </button>
                </div>
            </div>
            
            <!-- Step 3: Content -->
            <div id="step3" class="step-content p-6">
                <h2 class="text-xl font-semibold mb-6">Course Content</h2>
                <p class="text-gray-600 mb-4">Organize your course content into sections and lessons.</p>
                
                <div id="content-sections-container">
                    <!-- Content section template -->
                    <div class="content-section mb-6 p-4 border border-gray-200 rounded-lg">
                        <div class="flex justify-between items-center mb-3">
                            <input type="text" name="content_sections[]"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-xs"
                                placeholder="Section name (e.g. HTML, CSS, JavaScript)">
                            <button type="button" class="remove-section text-red-500 hover:text-red-700"
                                title="Remove section">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Lessons:</h4>
                        <div class="lessons-container">
                            <div class="lesson-item flex items-center mb-2">
                                <input type="text" name="lessons[0][]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                                    placeholder="Lesson title">
                                <button type="button" class="remove-lesson ml-2 text-red-500 hover:text-red-700"
                                    title="Remove lesson">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <button type="button" class="add-lesson mt-2 px-4 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Lesson
                        </button>
                    </div>
                </div>
                
                <button type="button" id="add-content-section"
                    class="mt-3 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Content Section
                </button>
                
                <div class="mt-8 flex justify-between">
                    <button type="button" id="step3-prev"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Previous
                    </button>
                    <button type="button" id="step3-next"
                        class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                        Next: Projects
                    </button>
                </div>
            </div>
            
            <!-- Step 4: Projects -->
            <div id="step4" class="step-content p-6">
                <h2 class="text-xl font-semibold mb-6">Course Projects</h2>
                <p class="text-gray-600 mb-4">Add projects that students will complete during the course.</p>
                
                <div id="projects-container">
                    <!-- Project template -->
                    <div class="project-item mb-6 p-4 border border-gray-200 rounded-lg">
                        <div class="flex justify-between items-center mb-3">
                            <input type="text" name="project_titles[]"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C] w-full max-w-md"
                                placeholder="Project title">
                            <button type="button" class="remove-project text-red-500 hover:text-red-700"
                                title="Remove project">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>

                        <div class="project-details-container">
                            <div class="project-detail-item flex items-center mb-2">
                                <input type="text" name="project_details[0][]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]"
                                    placeholder="Project detail or task">
                                <button type="button"
                                    class="remove-project-detail ml-2 text-red-500 hover:text-red-700"
                                    title="Remove detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button type="button"
                            class="add-project-detail mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add Project Detail
                        </button>
                    </div>
                </div>

                <button type="button" id="add-project"
                    class="mt-2 flex items-center text-[#003F7D] hover:text-[#002a54]">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Another Project
                </button>
            </div>
                <!-- Step 4: Review & Submit -->
                <div id="step4" class="tab-content p-6">
                    <h2 class="text-xl font-semibold mb-6 text-[#003F7D]">Review Your Course</h2>

                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="md:w-1/3">
                                <div id="review-image"
                                    class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400">
                                    <span>No image selected</span>
                                </div>
                            </div>

                            <div class="md:w-2/3">
                                <h3 id="review-title" class="text-2xl font-bold text-gray-800 mb-2">Course Title</h3>
                                <div class="flex items-center mb-4">
                                    <span id="review-status"
                                        class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mr-3">Status</span>
                                    <span id="review-pricing"
                                        class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">$0.00</span>
                                </div>
                                <p id="review-description" class="text-gray-600 mb-4">Course description will appear here.
                                </p>
                                <p id="review-about" class="text-gray-600">Detailed course description will appear here.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Objectives Review -->
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <h4 class="font-semibold text-[#FF914C] mb-3">Course Objectives</h4>
                            <ul id="review-objectives" class="list-disc pl-5 space-y-1 text-gray-600">
                                <li>No objectives added yet.</li>
                            </ul>
                        </div>

                        <!-- Content Sections Review -->
                        <div class="bg-white p-4 border border-gray-200 rounded-lg">
                            <h4 class="font-semibold text-[#FF914C] mb-3">Course Content</h4>
                            <div id="review-content" class="text-gray-600">
                                <p>No content sections added yet.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Projects Review -->
                    <div class="bg-white p-4 border border-gray-200 rounded-lg mb-6">
                        <h4 class="font-semibold text-[#FF914C] mb-3">Projects</h4>
                        <div id="review-projects" class="text-gray-600">
                            <p>No projects added yet.</p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" id="step4-prev"
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                            Previous
                        </button>
                        <button type="submint" id="create-course"
                            class="px-6 py-2 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF6B1A] transition-colors">
                            Create Course
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
  
@endsection




