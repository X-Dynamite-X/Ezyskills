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

<header class="bg-white  shadow-md" id="user-header" data-user-id="{{ auth()->user()->id ?? '' }}">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('logo.png') }}" alt="EZY Skills" class="w-32 h-auto">
        </div>
        <nav class="flex space-x-6 text-gray-600">
            <a href="{{ route('home') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('home') ? 'text-[#FF8B36]' : '' }}">Home</a>
            <a href="{{ route('pricing') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('pricing') ? 'text-[#FF8B36]' : '' }}">pricing</a>
            <a href="{{ route('courses') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('courses') ? 'text-[#FF8B36]' : '' }}">Courses</a>
            <a href="{{ route('student.index') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('student.index') ? 'text-[#FF8B36]' : '' }}">My
                Courses</a>
            <a href="{{ route('contactUs') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('contact') ? 'text-[#FF8B36]' : '' }}">Contact Us</a>
            <a href="{{ route('faq') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('faq') ? 'text-[#FF8B36]' : '' }}">FAQ</a>
            <a href="{{ route('about') }}"
                class="hover:text-[#FF8B36] {{ request()->routeIs('about') ? 'text-[#FF8B36]' : '' }}">About </a>
        </nav>
        <div class="flex space-x-4">
            @guest
                <button
                    class="px-4 py-2 border border-orange-500 text-[#FF8B36] rounded hover:bg-orange-500 hover:text-white transition loginBtn">
                    <a href="{{ route('login') }}">Log in</a>
                </button>
                <button class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition registerBtn">
                    <a href="{{ route('register') }}">Create Account</a>
                </button>
            @else
                <span
                    class="flex items-center px-3 py-1.5 bg-gradient-to-r from-[#FF8B36] to-[#FF6B1A] text-white rounded-lg shadow-sm mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium"id="mycredit"
                        data-credit="{{ auth()->user()->credit }}">{{ auth()->user()->credit }} Credits</span>
                </span>
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
                <div class="flex items-center">
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
                                @role('admin')
                                    <li>
                                        <a href="{{ route('admin.users') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF8B36]"
                                            role="menuitem">Dashboard</a>
                                    </li>
                                @endrole
                                @role('trainer')
                                    <li>
                                        <a href="{{ route('trainer.index') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF8B36]"
                                            role="menuitem">Dashboard</a>
                                    </li>
                                @endrole
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
            @endguest
        </div>
    </div>
</header>
