@auth
    @php
        $user = Auth::user();

        // جمع إشعارات المستخدم
        $userNotifications = $user->notifications;
        $unreadUserNotificationsCount = $user->unreadNotifications->count();

        // جمع إشعارات الدورات المسجلة فيها
        $enrolledCourses = $user
            ->enrollments()
            ->with([
                'course.notifications' => function ($query) {
                    $query->latest();
                },
            ])
            ->get();

        $courseNotifications = collect();
        $unreadCourseNotificationsCount = 0;

        foreach ($enrolledCourses as $enrollment) {
            $courseNotifications = $courseNotifications->merge($enrollment->course->notifications ?? []);

            $unreadCourseNotificationsCount += optional($enrollment->course->unreadNotifications)->count() ?? 0;
        }

        // دمج وترتيب الإشعارات
        $allNotifications = $userNotifications->merge($courseNotifications)->sortByDesc('created_at')->values();

        $totalUnreadCount = $unreadUserNotificationsCount + $unreadCourseNotificationsCount;
    @endphp
@endauth

<nav class="fixed top-0 z-50 w-full bg-[#003F7D] border-b border-gray-200"  id="user-header" data-user-id="{{ auth()->user()->id ?? '' }}">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-[#0a4e94] focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('logo.png') }}" class="h-8 me-3" alt="EZY Skills Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">EZY
                        Skills</span>
                </a>
            </div>
            <div class="flex items-center">
                 <div class="relative mr-3">
                    <button id="notificationBtn" type="button"
                        class="relative p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 9v5.159c0 .538-.214 1.055-.595 1.436L6 17h5m4 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @if ($totalUnreadCount > 0)
                            <span id="notificationBadge" data-total-unread-count={{ $totalUnreadCount ?? 0 }} class="text-sm bg-red-600 text-white px-2 py-0.5 rounded-full">
                                {{ $totalUnreadCount }}
                            </span>
                        @endif
                    </button>

                    <!-- Notifications Dropdown -->
                    <div id="notificationDropdown"
                        class="hidden absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-lg z-50">
                        <div class="p-3 border-b font-semibold text-gray-700">Notifications</div>
                        <ul id="notificationsList" class="max-h-60 overflow-y-auto divide-y divide-gray-100">
                            @foreach ($allNotifications as $notification)
                                <li class="p-3 hover:bg-gray-50">
                                    <div class="flex items-start">
                                        <div class="ml-3">

                                            <p class="text-sm text-gray-500">
                                                {{ $notification->data['message'] ?? 'No message content' }}
                                            </p>
                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-[#FF8B36] rounded-full focus:ring-4 focus:ring-[#FF8B36]/50"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->email) }}&background=random"
                                alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('admin.users') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF8B36]"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('student.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF8B36]"
                                    role="menuitem">My Courses</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF8B36]"
                                        role="menuitem">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-0 w-64 h-full pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-scroll bg-white">
        <ul class="space-y-2 font-medium">
            @role('admin')
                <li>
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pricingPlan.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                            <path
                                d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Pricing</span>
                        <span
                            class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-[#FF8B36] bg-[#FF8B36]/10 rounded-full">New</span>
                    </a>
                </li>
            @endrole


            @role('trainer')
                <li>
                    <a href="{{ route('trainer.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Trainer</span>
                    </a>
                </li>
            @endrole

            <li>
                <a href="{{ route('home') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                </a>
            </li>


            <li>
                <a href="{{ route('contactUs') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Contact Us</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#003F7D]/10 hover:text-[#003F7D] group">
                    @csrf
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-[#003F7D]"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <button type="submit" class="flex-1 ms-3 whitespace-nowrap text-left">Sign Out</button>
                </form>
            </li>
        </ul>
    </div>
</aside>
