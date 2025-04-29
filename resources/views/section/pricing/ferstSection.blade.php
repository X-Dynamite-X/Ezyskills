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
        <div class="absolute left-[27%] max-w-[80%] z-10  py-10 px-4 rounded-4xl shadow-4xl shadow-black">

            <div class="   mx-auto py-12 px-4 flex flex-col lg:flex-row justify-center items-center gap-8">

                <div class="bg-white rounded-4xl shadow-md text-center   w-full  ">
                    <div class="bg-[#FF8B36] p-6 rounded-4xl">

                        <div class="bg-[#fff] text-[#FF8B36] text-sx font-bold px-4 py-1 rounded-xl inline-block mb-4">
                            College Program
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">₹ 20,000 <span
                                class="text-base font-medium text-white">+ Tax</span></h2>
                        <p class=" text-sm mb-6">(Exclusive of GST & Taxes)</p>
                    </div>

                    <div class="text-left mb-6 space-y-4 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">1-1 Individuals</span>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group 2212.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">Choose Timings</span>
                        </div>
                    </div>

                    <button
                        class="text-orange-600 border border-orange-600 px-6 py-2 rounded-md font-medium hover:bg-orange-600 hover:text-white transition">
                        Choose Plan
                    </button>

                    <p class="text-xs text-gray-400 mt-4">🧾 Razorpay</p>
                </div>

                <!-- Employee Program -->
                <div
                    class="bg-white rounded-4xl shadow-md h-[30rem] w-full max-w-sm flex flex-col justify-between items-center text-center   ">
                    <!-- العنوان والسعر -->
                    <div class="w-full">
                        <div class="bg-[#FF8B36] py-12 rounded-4xl">
                            <div
                                class="bg-white text-[#FF8B36] text-sm font-bold px-4 py-1 rounded-xl inline-block mb-4">
                                Employee Program
                            </div>
                            <h2 class="text-3xl font-bold text-white mb-2">
                                ₹ 50,000 <span class="text-base font-medium text-white">+ Tax</span>
                            </h2>
                            <p class="text-white text-sm">(Exclusive of GST & Taxes)</p>
                        </div>
                    </div>

                    <!-- الميزات -->
                    <div class="space-y-4 mt-6">
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group 2213.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">1-1 Individuals</span>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group 2212.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">Choose Timings</span>
                        </div>
                    </div>

                    <!-- الزر والملاحظات -->
                    <div class="flex flex-col items-center space-y-2 mt-6">
                        <button
                            class="text-orange-600 border border-orange-600 px-6 py-2 rounded-md font-medium hover:bg-orange-600 hover:text-white transition">
                            Choose Plan
                        </button>
                        <p class="text-xs text-gray-400">🧾 Razorpay</p>
                    </div>
                </div>


                <!-- Complete Transformation Program -->
                <div class="bg-white rounded-4xl shadow-md text-center   w-full  ">
                    <div class="bg-[#FF8B36] p-6 rounded-4xl">

                        <div class="bg-[#fff] text-[#FF8B36] text-sx font-bold px-4 py-1 rounded-xl inline-block mb-4">
                            Complete Transformation Program
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">₹ 75,000 <span
                                class="text-base font-medium text-white">+ Tax</span></h2>
                        <p class=" text-sm mb-6">(Exclusive of GST & Taxes)</p>
                    </div>

                    <div class="text-left mb-6 space-y-4 px-4">
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group 2213.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">1-1 Individuals</span>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <img src="{{ asset('img/priscng/Group 2212.png') }}" alt="icon" class="w-5 h-5" />
                            <span class="text-sm text-gray-700">Choose Timings</span>
                        </div>
                    </div>

                    <button
                        class="text-orange-600 border border-orange-600 px-6 py-2 rounded-md font-medium hover:bg-orange-600 hover:text-white transition">
                        Choose Plan
                    </button>

                    <p class="text-xs text-gray-400 mt-4">🧾 Razorpay</p>
                </div>
            </div>
        </div>
</section>
