<section class="bg-[#FF914C] text-white rounded-b-[30%] min-h-[25rem] ">
    <div class="  mx-auto px-6 py-16 items-center justify-between gap-8">

        <!-- النص -->

        <p class="text-white text-3xl font-bold mb-4 text-center">Contact Our Team</p>


        <div class="absolute leftpont z-0 top-1/2 leftpont">
            <div class="grid grid-cols-3 gap-2">
                @for ($i = 0; $i < 36; $i++)
                    <div class="w-2 h-2 bg-[#FF914C] rounded-full"></div>
                @endfor
            </div>
        </div>

        <div class="absolute left-[20%] max-w-[60%] z-10 bg-white py-10 px-4 rounded-4xl shadow-4xl shadow-black">
      <img src="{{ asset('img/renag.png') }}"
                class="absolute top-[100%] z-0 right-[1rem] -translate-y-1/2 translate-x-1/2 w-[10rem]"
                alt="orange imag">
            <form class="p-12 m-4 z- ">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your name*</label>
                        <input type="text" id="name" name="name" placeholder="Julia William"
                            class="border border-gray-300 bg-white px-3 py-2 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 sm:text-base  ">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Contact email*</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com"
                            class="border border-gray-300 bg-white px-3 py-2 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 sm:text-base  ">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number*</label>
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number"
                            class="border border-gray-300 bg-white px-3 py-2 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 sm:text-base  ">
                    </div>
                    <div>
                        <label for="issue" class="block text-sm font-medium text-gray-700">Issue Related to *</label>
                        <select id="issue" name="issue"
                            class="border border-gray-300 bg-white px-3 py-2 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 sm:text-base  ">
                            <option selected>Course Structure</option>
                            <option>Payment Failure</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Your message*</label>
                    <textarea id="message" name="message" rows="4" placeholder="Type your message...."
                        class="border border-gray-300 bg-white px-3 py-2 rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 block w-full p-2.5 sm:text-base  "></textarea>
                </div>
                <p class="text-lg  text-[#5A7184] ">
                    By submitting this form you agree to our terms and conditions and our Privacy Policy which explains
                    how we may collect, use and disclose your personal information including to third parties.
                </p>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Send</button>
            </form>

        </div>
</section>
