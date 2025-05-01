@extends('layouts.app')

@section('title', 'Pricing Plans Management')

@section('main')
    <div class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <div class="bg-[#003F7D] text-white py-16 px-4">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-4">Pricing Plans Management</h1>
                <p class="text-lg opacity-90">Manage and monitor all pricing plans in your system</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 -mt-10">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Actions Bar -->
                <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-8">
                    <!-- Search -->
                    <div class="relative w-full md:w-96">
                        <input type="text" id="searchInput"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#FF914C] focus:border-transparent"
                            placeholder="Search plans...">
                        <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Add Plan Button -->
                    <button id="addPlanBtn"
                        class="w-full md:w-auto px-6 py-3 bg-[#FF914C] hover:bg-[#FF913d] text-white rounded-lg transition duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Plan
                    </button>
                </div>

                <!-- Pricing Plans Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" id="pricingPlansSection">
                    @foreach ($pricingPlans as $plan)
                        @include('admin.pricing.planCard', ['plan' => $plan])
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $pricingPlans->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal-container">
        @include('admin.pricing.modals.create')
        @include('admin.pricing.modals.edit')
        @include('admin.pricing.modals.delete')
    </div>
@endsection
