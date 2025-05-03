<div id="courseConfirmModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center  bg-opacity-50">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t bg-[#003F7D] text-white">
                <h3 class="text-xl font-semibold">
                    Confirm Course Purchase
                </h3>
                <button type="button"
                    class="close-confirm-modal text-white bg-transparent hover:bg-[#002a54] hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <div class="flex items-center mb-4">

                    <div>
                        <h4 id="course-title-preview" class="text-lg font-semibold text-gray-900 mb-1"></h4>
                        <p id="course-price-preview" class="text-[#FF914C] font-bold"></p>
                    </div>
                </div>

                <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                    <p class="text-gray-700 mb-2">Course Details:</p>
                    <p id="course-description-preview" class="text-gray-600 text-sm"></p>
                </div>

                <input type="hidden" id="courseId" value="">
                <div id="purchase-status" class="hidden mb-4 p-3 rounded-lg"></div>

                <div class="flex justify-center mt-6">
                    <button type="button" id="confirmPurchase"
                        class="text-white bg-[#FF914C] hover:bg-[#e67d2e] focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Confirm Purchase
                    </button>
                    <button type="button"
                        class="close-confirm-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
