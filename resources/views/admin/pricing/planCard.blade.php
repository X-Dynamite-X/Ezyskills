  <div
      id="plan_{{ $plan->id }}"class="pricing-plan bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div class="p-5 border-b border-gray-200 bg-gray-50">
          <h3 class="text-xl font-semibold text-[#003F7D] plan-name">{{ $plan->name }}</h3>
      </div>
      <div class="p-5">
          <div class="mb-4 flex items-end">
              <span class="text-3xl font-bold text-[#003F7D] plan-price"
                  id='plan-price'>${{ number_format($plan->price, 2) }}</span>
          </div>
          <div class="mb-4">
              <p class="text-gray-600 plan-description">{{ $plan->description }}</p>
          </div>
          <div class="space-y-2 mb-6 plan-features">
              @foreach (explode(',', $plan->features) as $feature)
                  <div class="flex items-center">
                      <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-600">{{ trim($feature) }}</span>
                  </div>
              @endforeach
              <div class="flex items-center mt-2">
                  <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"></path>
                  </svg>
                  <span class="text-gray-600 plan-credit">{{ $plan->credit }} Credits</span>
              </div>
          </div>
          <div class="flex space-x-2">
              <button id='editPlanBtn_{{ $plan->id }}' data-plan-id="{{ $plan->id }}"
                  data-plan-name="{{ $plan->name }}" data-plan-price="{{ $plan->price }}"
                  data-plan-credits="{{ $plan->credit }}" data-plan-features="{{ $plan->features }}"
                  data-plan-description="{{ $plan->description }}"
                  class="edit-plan-btn flex-1 py-2 bg-[#003F7D] text-white rounded hover:bg-[#003F7D]/90 transition-colors duration-300 flex items-center justify-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                      </path>
                  </svg>
                  Edit
              </button>
              <button
                  class="delete-plan-btn flex-1 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-300 flex items-center justify-center"
                  data-plan-id="{{ $plan->id }}">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                      </path>
                  </svg>
                  Delete
              </button>
          </div>
      </div>
  </div>
