<div id="editPlanModal"
    class="modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center bg-opacity-50">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Edit Pricing Plan
                </h3>
                <button type="button"
                    class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="editPlanForm"   method="POST">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-6" >
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="edit_name" class="block mb-2 text-sm font-medium text-gray-900">Plan
                                Name</label>
                            <input type="text" name="name" id="edit_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003F7D] focus:border-[#003F7D] block w-full p-2.5"
                                placeholder="Basic, Premium, etc." required>
                        </div>
                        <div>
                            <label for="edit_price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" name="price" id="edit_price" step="0.01" min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003F7D] focus:border-[#003F7D] block w-full pl-7 p-2.5"
                                    placeholder="29.99" required>
                            </div>
                        </div>
                        <div>
                            <label for="edit_credit"
                                class="block mb-2 text-sm font-medium text-gray-900">Credits</label>
                            <input type="number" name="credit" id="edit_credit" min="0"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003F7D] focus:border-[#003F7D] block w-full p-2.5"
                                placeholder="5" required>
                        </div>
                    </div>
                    <div>
                        <label for="edit_description"
                            class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea name="description" id="edit_description" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003F7D] focus:border-[#003F7D] block w-full p-2.5"
                            placeholder="Brief description of the plan"></textarea>
                    </div>
                    <div>
                        <label for="edit_features" class="block mb-2 text-sm font-medium text-gray-900">Features (comma
                            separated)</label>
                        <textarea name="features" id="edit_features" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003F7D] focus:border-[#003F7D] block w-full p-2.5"
                            placeholder="Access to all courses, 24/7 support, etc."></textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="button"
                        class="close-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                    <button type="submit"
                        class="text-white bg-[#003F7D] hover:bg-[#003F7D]/90 focus:ring-4 focus:outline-none focus:ring-[#003F7D]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="savePlanBtn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
