<header class="bg-white  shadow-md">
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
                <button>
                    @include('layouts.svg.seting')
                </button>
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
                                    <a href="{{ route('courses') }}"
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


{{--





--}}
