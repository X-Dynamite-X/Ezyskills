@extends('layouts.app')



@section('title', 'Users Management')

@section('main')
    <div class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <div class="bg-[#003F7D] text-white py-16 px-4">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-4">Users Management</h1>
                <p class="text-lg opacity-90">Manage and monitor all users in your system</p>
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
                            placeholder="Search users...">
                        <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Add User Button -->
                    <button
                        class="w-full md:w-auto px-6 py-3 bg-[#FF914C] hover:bg-[#FF913d] text-white rounded-lg transition duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New User
                    </button>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <button
                        class="px-6 py-2 rounded-full bg-[#003F7D] text-white hover:bg-[#FF914C] transition duration-300">
                        All Users
                    </button>
                    <button
                        class="px-6 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-[#FF914C] hover:text-white transition duration-300">
                        Administrators
                    </button>
                    <button
                        class="px-6 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-[#FF914C] hover:text-white transition duration-300">
                        Regular Trainer
                    </button>
                    <button
                        class="px-6 py-2 rounded-full bg-gray-100 text-gray-700 hover:bg-[#FF914C] hover:text-white transition duration-300">
                        Regular Users
                    </button>
                </div>

                <!-- Users Table -->
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">Role</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-[#003F7D]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="users-table">
                            @include('admin.users.table', ['users' => $users])
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal-container">
        @include('admin.users.model.edit')
        @include('admin.users.model.delete')
    </div>
@endsection
