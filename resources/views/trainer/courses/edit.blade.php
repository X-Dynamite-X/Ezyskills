@extends('layouts.app')

@section('title', 'Edit Course')

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

        @if (session('error'))
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
            @include('trainer.courses.section.step1',['course'=>$course])
            <!-- Step 2: Objectives -->
            @include('trainer.courses.section.step2',['course'=>$course])

            <!-- Step 3: Content -->
            @include('trainer.courses.section.step3',['course'=>$course])
            <!-- Step 4: Projects -->
            @include('trainer.courses.section.step4',['course'=>$course])

            <!-- Step 4: Review & Submit -->
            @include('trainer.courses.section.review',['course'=>$course])

        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

@endsection
