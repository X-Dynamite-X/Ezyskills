<header class="bg-white  shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('logo.png') }}" alt="EZY Skills" class="w-32 h-auto">
        </div>
        <nav class="flex space-x-6 text-gray-600">
            <a href="{{ route("home") }}" class="hover:text-[#FF8B36] {{ request()->routeIs('home') ? 'text-[#FF8B36]' : '' }}">Home</a>
            <a href="#" class="hover:text-[#FF8B36] {{ request()->routeIs('courseSelector') ? 'text-[#FF8B36]' : '' }}">Course Selector</a>
            <a href="#" class="hover:text-[#FF8B36] {{ request()->routeIs('courses') ? 'text-[#FF8B36]' : '' }}">Courses</a>
            <a href="{{ route("contactUs") }}" class="hover:text-[#FF8B36] {{ request()->routeIs('contact') ? 'text-[#FF8B36]' : '' }}">Contact Us</a>
            <a href="{{ route('faq') }}" class="hover:text-[#FF8B36] {{ request()->routeIs('faq') ? 'text-[#FF8B36]' : '' }}">FAQ</a>
            <a href="{{ route('about') }}" class="hover:text-[#FF8B36] {{ request()->routeIs('about') ? 'text-[#FF8B36]' : '' }}">About </a>
        </nav>
        <div class="flex space-x-4">
            @guest
                <button class="px-4 py-2 border border-orange-500 text-[#FF8B36] rounded hover:bg-orange-500 hover:text-white transition loginBtn">
                    <a href="{{ route('login') }}">Log in</a>
                </button>
                <button class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition registerBtn">
                    <a href="{{ route('register') }}">Create Account</a>
                </button>
            @else
                <button>
                    @include("layouts.svg.seting")
                </button>
                <button>
                    @include("layouts.svg.usersvg")
                </button>
            @endguest
        </div>
    </div>
</header>
