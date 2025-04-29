<section class="bg-[#03326D] text-white rounded-bl-4xl ">
        <div class="container mx-auto px-6 py-16 flex flex-col lg:flex-row items-center justify-between gap-8">

            <!-- النص -->
            <div class="flex-1">
                <p class="text-orange-500 text-sm font-semibold mb-4">ABOUT US</p>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    The Platform<br>
                    For The Next<br>
                    Billion Learners
                </h1>
                <p class="text-gray-300 text-lg">
                    Transforming tech education for the next generation of students & employees
                </p>
            </div>

            <!-- الصور -->
            <div class="flex-1 grid grid-cols-2 gap-2 relative">
                <div class="col-span-1">
                    <img src="{{ asset('img/about/3.png') }}" alt="Library"
                        class="rounded-lg h-[12rem] w-[14rem] object-cover ">
                </div>
                <div class="col-span-1 flex flex-col gap-2">
                    <img src="{{ asset('img/about/2.png') }}" alt="Team"
                        class="rounded-lg z-2 h-[8rem] w-[16rem] object-cover  ">
                    <img src="{{ asset('img/about/1.png') }}" alt="Students"
                        class="rounded-lg z-2 h-[14rem] w-[18rem] object-cover absolute top-[10rem] right-[5rem]">
                </div>

                <!-- الدائرة البرتقالية -->
                <img src="{{ asset('img/renag.png') }}"
                    class="absolute top-[10rem] z-0 right-[5rem] -translate-y-1/2 translate-x-1/2" alt="orange imag">
            </div>

        </div>

        <!-- النقاط البرتقالية -->
        <div class="absolute left-1/4 top-1/2">
            <div class="grid grid-cols-12 gap-2">
                @for ($i = 0; $i < 36; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>
    </section>
