<section class="py-16 px-8 ">
    <div class="container mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <div class="text-left">
                <h2 class="text-[54px] font-bold  mb-12 text-[#003F7D]">
                    World’s First AI Based
                    <strong class="text-[#FF914C]">
                        Online Learning Platform
                    </strong>
                </h2>
            </div>
            <div class="flex flex-col items-center">
                <img  id="feature-image" src="{{ asset('img/home/features/1.png') }}" alt="AI Selector" class="mb-2">
                <div class="flex space-x-2" id="indicator">
                    <span class="h-1.5 w-12 bg-[#FF914C] rounded-full"></span>
                    <span class="h-1.5 w-12 bg-gray-300 rounded-full"></span>
                    <span class="h-1.5 w-12 bg-gray-300 rounded-full"></span>
                    <span class="h-1.5 w-12 bg-gray-300 rounded-full"></span>
                </div>
            </div>

        </div>
    </div>
    @include('layouts.svg.home.features.rowBount')
</section>
