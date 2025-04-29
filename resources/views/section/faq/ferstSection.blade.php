<section class="bg-[#FF914C] text-white rounded-b-[30%] min-h-[25rem] ">
    <div class="  mx-auto px-6 py-16 items-center justify-between gap-8">



        <p class="text-white text-3xl font-bold mb-4 text-center">Frequently Asked Questions</p>


        <div class="absolute leftpont z-0 top-1/2 leftpont">
            <div class="grid grid-cols-3 gap-2">
                @for ($i = 0; $i < 36; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>

        <div class="absolute left-[20%] max-w-[60%] z-10 bg-white py-10 px-4 rounded-4xl shadow-4xl shadow-black ">
            <img src="{{ asset('img/renag.png') }}"
                class="absolute top-[100%] z-0 right-[1rem] -translate-y-1/2 translate-x-1/2 w-[10rem]" alt="orange imag">
            <form class="p-12 m-4 z- ">
                <div class="accordion">
                    <!-- First item (open by default) -->
                   <form class="p-12 m-4">
    <div class="accordion">
        <!-- Accordion Item -->
        <div class="accordion-item active border-l-4 border-orange-500">
            <div class="accordion-header flex items-center p-4 cursor-pointer">
                <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                <span class="plus-icon text-orange-500 mr-2 text-xl font-bold hidden">+</span>
                <h3 class="text-base font-medium text-orange-500">Who is eligible for this program?</h3>
            </div>
            <div class="accordion-content px-4 pb-4 pl-10 border-l-2 border-orange-500 ml-4">
                <p class="text-gray-600">
                    Any Degree/Btech/BE/MTech final year, Passed outs, Individuals, Employees are eligible
                    for this program.
                </p>
            </div>
        </div>

        <!-- Loop the following for other questions -->
        <div class="accordion-item border-b border-gray-200">
            <div class="accordion-header flex items-center p-4 cursor-pointer">
                <span class="minus-icon text-orange-500 mr-2 text-xl font-bold hidden">−</span>
                <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                <h3 class="text-black font-medium">What is the duration of the program?</h3>
            </div>
            <div class="accordion-content hidden px-4 pb-4 pl-10">
                <p class="text-gray-600">
                    The program duration is 6 months including project work and mentorship.
                </p>
            </div>
        </div>
                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">Do I get the assured placement?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">What is the basic academic percentage required to enroll
                                for the course?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">What is the execution plan of the program?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">Can we take this course online?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">I am already employed, will I be eligible for the program?
                            </h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">What if I miss the session due to an emergency?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">Can we take this course online?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">Do you provide any certificate after the program?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item border-b border-gray-200">
                        <div class="accordion-header flex items-center p-4 cursor-pointer">
                            <span class="minus-icon text-orange-500 mr-2 text-xl font-bold">−</span>
                            <span class="plus-icon text-orange-500 mr-2 text-xl font-bold">+</span>
                            <h3 class="text-black font-medium">Have suggestions for us?</h3>
                        </div>
                        <div class="accordion-content hidden px-4 pb-4 pl-10">
                            <p class="text-gray-600">
                               Any Degree/Btech/BE/MTech final year, Passed outs, Individuals,
Employees are eligible for this program.
                            </p>
                        </div>
                    </div>
            </form>

        </div>
</section>
