@extends('layouts.app')



@section('title', 'Users Management')

@section('main')
    <div class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <div class="bg-[#003F7D] text-white py-16 px-4">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-4">Corses Management</h1>
                <p class="text-lg opacity-90">Manage and monitor all Corses in your system</p>
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
                            placeholder="Search corses...">
                        <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Add User Button -->
                    <button
                        onclick="window.location.href = '{{ route('trainer.create') }}'"
                        class="w-full md:w-auto px-6 py-3 bg-[#FF914C] hover:bg-[#FF913d] text-white rounded-lg transition duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Corses
                    </button>
                </div>

                <!-- Filters -->
                <div class="flex justify-center gap-6 border-gray-200 w-full">
                    <button
                        class="status-filter active-filter px-6 py-2 text-[#FF914C] border-b-2 border-[#FF914C] font-medium"
                        data-status="">
                        All Courses
                    </button>
                    <button
                        class="status-filter px-6 py-2 text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] transition-all font-medium"
                        data-status="opened">
                        Opened
                    </button>
                    <button
                        class="status-filter px-6 py-2 text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] transition-all font-medium"
                        data-status="coming Soon">
                       Coming Soon
                    </button>
                    <button
                        class="status-filter px-6 py-2 text-gray-500 hover:text-[#FF914C] hover:border-b-2 hover:border-[#FF914C] transition-all font-medium"
                        data-status="archived">
                        Archived
                    </button>
                </div>

                <!-- Users Table -->
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">title</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">pricing</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">studant</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="courses-table">
                            @include('trainer.table', ['courses' => $courses])
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal-container">
        @include('trainer.model.edit')
        @include('trainer.model.studant')
        @include('trainer.model.courseInfo')
        @include('trainer.model.delete')
    </div>
@endsection

