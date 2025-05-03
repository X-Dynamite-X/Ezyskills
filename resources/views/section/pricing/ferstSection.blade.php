<section class="bg-[#003F7D] text-white rounded-b-[30%] min-h-[25rem]">
    <div class="mx-auto px-6 py-16 items-center justify-between gap-8">
        <!-- النص -->
        <p class="text-white text-3xl font-bold mb-4 text-center">
            Our <strong class="text-[#FF8B36]">Pricing</strong>
        </p>

        <!-- نقاط الزينة على الجانبين -->
        <div class="absolute left-[10%] z-10 top-1/2">
            <div class="grid grid-cols-4 gap-2">
                @for ($i = 0; $i < 24; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>
        <div class="absolute right-[10%] z-10 top-1/2">
            <div class="grid grid-cols-4 gap-2">
                @for ($i = 0; $i < 24; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>

        <!-- خطط التسعير -->
        <div class="absolute left-[10%] max-w-[80%] z-10 py-10 px-4 rounded-4xl shadow-4xl shadow-black">
            <div class="mx-auto py-12 px-4 overflow-x-auto">
                <div class="flex gap-6 flex-nowrap min-w-fit w-max">
                    @foreach ($pricingPlans as $pricing)
                        <div class="w-full max-w-sm min-w-[18rem] rounded-3xl shadow-lg">
                            {{-- Top orange section --}}
                            <div class="bg-orange-400 p-6 pb-10 relative rounded-t-3xl">
                                {{-- White header box --}}
                                <div class="bg-white rounded-xl px-6 py-2 shadow-md -mt-10 mx-auto w-fit">
                                    <h2 class="text-orange-400 text-lg font-medium">{{ $pricing->name }}</h2>
                                </div>

                                {{-- Price section --}}
                                <div class="text-center mt-8 text-white">
                                    <h1 class="text-4xl font-bold">₹ {{ $pricing->pricing }} <span
                                            class="text-lg font-normal">+ Tax</span></h1>
                                    <p class="text-sm mt-1">(Exclusive of GST & Taxes)</p>
                                </div>
                            </div>

                            {{-- Bottom white section --}}
                            <div class="bg-white p-6 rounded-b-3xl">
                                {{-- Description --}}
                                <p class="text-gray-600 mb-6 text-sm">{{ $pricing->description }}</p>

                                {{-- Features list --}}
                                <div class="space-y-4">
                                    {{-- Credits --}}
                                    <div class="flex items-start gap-3">
                                        <div class="bg-orange-100 p-1.5 rounded-full mt-0.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="text-sm text-gray-700">{{ $pricing->credit }} Credits</span>
                                    </div>

                                    {{-- Individuals --}}
                                    <div class="flex items-start gap-3">
                                        <div class="bg-orange-100 p-1.5 rounded-full mt-0.5">
                                            <img src="{{ asset('img/priscng/Group 2213.png') }}" alt="icon"
                                                class="w-4 h-4" />
                                        </div>
                                        <span class="text-sm text-gray-700">1-1 Individuals</span>
                                    </div>

                                    {{-- Choose Timings --}}
                                    <div class="flex items-start gap-3">
                                        <div class="bg-orange-100 p-1.5 rounded-full mt-0.5">
                                            <img src="{{ asset('img/priscng/Group 2212.png') }}" alt="icon"
                                                class="w-4 h-4" />
                                        </div>
                                        <span class="text-sm text-gray-700">Choose Timings</span>
                                    </div>
                                </div>

                                {{-- Button --}}
                                <div class="mt-6 text-center">
                                    @auth
                                        <button data-pricing="{{ $pricing->id }}"
                                            class="pricing-btn w-full text-orange-600 border-2 border-orange-600 px-6 py-2.5 rounded-xl font-medium hover:bg-orange-600 hover:text-white transition-all duration-300 focus:ring-2 focus:ring-orange-300 focus:outline-none">
                                            Choose Plan
                                        </button>
                                    @else
                                        <button onclick="window.location.href = '{{ route('login') }}';"
                                            class="w-full text-orange-600 border-2 border-orange-600 px-6 py-2.5 rounded-xl font-medium hover:bg-orange-600 hover:text-white transition-all duration-300 focus:ring-2 focus:ring-orange-300 focus:outline-none">
                                            Login first
                                        </button>
                                    @endauth

                                    {{-- Payment Note --}}
                                    <p class="text-xs text-gray-400 mt-3 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Secure payment via Razorpay
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('section.pricing.confirm')
    </div>
</section>
