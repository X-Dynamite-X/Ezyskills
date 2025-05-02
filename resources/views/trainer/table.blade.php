        @foreach ($courses as $course)
            <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    #{{ $course->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div id="courseTitle_{{ $course->id }}" class="text-sm text-gray-600">
                        {{ $course->title }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div id="courseDescription_{{ $course->id }}" class="text-sm text-gray-600">
                        {{ $course->description }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div id="coursePricing_{{ $course->id }}" class="text-sm text-gray-600">
                        {{ $course->pricing }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span id="courseStatus_{{ $course->id }}"
                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                  'bg-green-100 text-green-800 ">
                        {{ $course->status }}
                    </span>
                </td>
                   <td class="px-6 py-4 whitespace-nowrap">
                    <div id="coursePricing_{{ $course->id }}" class="text-sm text-gray-600">
                        {{ $course->enrolledUsers->count() ?? 0}}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-3">
                        <button class="info-course-btn flex items-center justify-center"
                                data-course="{{ json_encode($course) }}"
                                data-course-info="{{ json_encode($course->courseInfo) }}">
                            <span
                                class="inline-flex items-center justify-center w-9 h-9 bg-[#003F7D] text-white rounded-lg hover:bg-[#002a54] transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                        <button class="info-student-btn flex items-center justify-center"

                                data-studant-info = {{ $course->enrolledUsers }}
                                data-course-id="{{ $course->id }}">
                            <span
                                class="inline-flex items-center justify-center w-9 h-9 bg-[#4CAF50] text-white rounded-lg hover:bg-[#3d8b40] transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </button>

                        <button class="edit-course-btn flex items-center justify-center"
                            data-course-id="{{ $course->id }}" data-course-title="{{ $course->title }}"
                            data-course-description="{{ $course->description }}"
                            data-course-pricing="{{ $course->pricing }}" data-course-status="{{ $course->status }}">
                            <span
                                class="inline-flex items-center justify-center w-9 h-9 bg-[#FF914C] text-white rounded-lg hover:bg-[#FF913d] transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </span>
                        </button>
                        <button class="delete-course-btn flex items-center justify-center"
                            data-course-id="{{ $course->id }}">
                            <span
                                class="inline-flex items-center justify-center w-9 h-9 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach


