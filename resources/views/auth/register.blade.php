@extends('layouts.app')
@section('main')
    <main class="container mx-auto flex flex-col md:flex-row items-center py-12">
        <!-- Form Section -->

        <div class="bg-white rounded-4xl shadow-lg p-8 w-full md:w-1/3 ">
            <h2 class="text-2xl font-bold mb-6"><span class="text-gray-800">Create</span> <span
                    class="text-orange-500">Account</span></h2>
            <form id="register-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <input type="email" placeholder="Email Address" name="email" id="email" required
                        class="w-full border-b-1 p-3 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" placeholder="Password" name="password" id="password" required
                        class="w-full   border-b-1 p-3 rounded focus:outline-none focus:ring-2 focus:ring-orange-500">
                             @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" placeholder="Password" name="password_confirmation" id="password_confirmation"
                        required
                        class="w-full   p-3 rounded border-b-1 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div class="flex items-center mb-4">
                    <input type="checkbox" class="mr-2" id='rememberMe'>
                    <label class="text-gray-600 text-sm" for='rememberMe'>Remember me</label>
                </div>
                <div class="flex justify-center items-center   ">
                    <button type="submit"
                        class="bg-[#003F7D] text-white py-2 rounded hover:bg-blue-700 transition w-[175px] h-[40px]">
                        Create Account
                    </button>
                </div>


                <p class="text-sm text-gray-400 text-center mt-4">Already a member? <a href="{{ route('login') }}"
                        class="text-black"> Login Here</a></p>

                <div class="flex justify-between mt-4">
                    <button class="flex items-center border rounded px-4 py-2 text-sm text-gray-600 bg-[#F3F3F3]">
                        <img src="{{ asset('img/google.png') }}" class="w-5 h-5 mr-2" alt=""> Sign in
                    </button>
                    <button class="flex items-center border rounded px-4 py-2 text-sm text-white bg-[#3575DC]">
                        <img src="{{ asset('img/facbook.png') }}" class="w-5 h-5 mr-2" alt=""> Sign in
                    </button>
                    <button class="flex items-center border rounded px-4 py-2 text-sm text-white bg-[#404040]">
                        <img src="{{ asset('img/apple-logo-svgrepo-com 1.png') }}" class="w-5 h-5 mr-2" alt=""> Sign
                        in
                    </button>
                </div>
                <p class="text-[12.43px] text-gray-500 mt-4 text-center">
                    By continuing, you agree to the <strong class="text-[#F98149]"> Terms of Service </strong> and <strong
                        class="text-[#F98149]"> Privacy Policy </strong>

                </p>
            </form>
        </div>

        <!-- Image/Illustration Section -->
        <div class="w-full md:w-2/3 mt-8 md:mt-0 flex justify-center">
            @include('layouts.svg.svg1')
        </div>
    </main>
@endsection
