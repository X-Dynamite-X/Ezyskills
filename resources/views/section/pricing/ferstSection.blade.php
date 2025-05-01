<section class="bg-[#003F7D] text-white rounded-b-[30%] min-h-[25rem] ">
    <div class="  mx-auto px-6 py-16 items-center justify-between gap-8">

        <!-- النص -->

        <p class="text-white text-3xl font-bold mb-4 text-center">Our <strong class="text-[#FF8B36]">Pricing</strong></p>


        <div class="absolute left-[10%] z-10 top-1/2 ">
            <div class="grid grid-cols-4 gap-2">
                @for ($i = 0; $i < 24; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>
        <div class="absolute right-[10%] z-10 top-1/2 ">
            <div class="grid grid-cols-4 gap-2">
                @for ($i = 0; $i < 24; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>
        <div class="absolute left-[10%] max-w-[80%] z-10  py-10 px-4 rounded-4xl shadow-4xl shadow-black">

            <div class="   mx-auto py-12 px-4 flex flex-col lg:flex-row justify-center items-center gap-8">


                @foreach ($pricingPlans as $pricing)
                    <div
                        class="bg-white rounded-4xl shadow-md h-[33rem] w-full max-w-sm flex flex-col justify-between items-center text-center   ">
                        <!-- العنوان والسعر -->
                        <div class="w-full">
                            <div class="bg-[#FF8B36] py-12 rounded-4xl">
                                <div
                                    class="bg-white text-[#FF8B36] text-sm font-bold px-4 py-1 rounded-xl inline-block mb-4">
                                    {{ $pricing->name }}
                                </div>
                                <h2 class="text-3xl font-bold text-white mb-2">
                                    ₹ {{ $pricing->price }} <span class="text-base font-medium text-white">+ Tax</span>
                                </h2>
                                <p class="text-white text-sm">(Exclusive of GST & Taxes)</p>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col h-64">
                            <!-- الوصف -->
                            <p class="text-gray-600 mb-6 text-sm">{{ $pricing->description }}</p>

                            <!-- المميزات -->
                            <div class="space-y-4 flex-grow">
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
                                <div class="flex items-start gap-3">
                                    <div class="bg-orange-100 p-1.5 rounded-full mt-0.5">
                                        <img src="{{ asset('img/priscng/Group 2213.png') }}" alt="icon"
                                            class="w-4 h-4" />
                                    </div>
                                    <span class="text-sm text-gray-700">1-1 Individuals</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="bg-orange-100 p-1.5 rounded-full mt-0.5">
                                        <img src="{{ asset('img/priscng/Group 2212.png') }}" alt="icon"
                                            class="w-4 h-4" />
                                    </div>
                                    <span class="text-sm text-gray-700">Choose Timings</span>
                                </div>
                            </div>

                            <!-- الزر والملاحظات -->
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
         @include('section.pricing.confirm')
</section>
