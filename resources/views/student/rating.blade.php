 <div class="container mx-auto px-4 py-8 max-w-md">

     <div class="text-center mb-8">
         <h2 class="text-2xl font-bold text-gray-800">Course Rating</h2>
         <p class="text-gray-600 mt-2">Rate the course from 1 to 5 stars</p>
     </div>

     <div class="bg-white rounded-lg shadow p-6">
         <form id="simpleEvaluationForm" action="{{ route('rating.course', $enrollment->course->id) }}" method="POST">
             @csrf

             <div class="text-center mb-6">
                 <div class="rating-stars flex justify-center space-x-2">
                     @for ($i = 5; $i >= 1; $i--)
                         <input type="radio" id="simpleStar{{ $i }}" name="rating"
                             value="{{ $i }}" class="hidden">
                         <label for="simpleStar{{ $i }}"
                             class="text-4xl cursor-pointer text-gray-300 hover:text-yellow-400">★</label>
                     @endfor
                 </div>
                 <div class="flex justify-between mt-2 text-sm text-gray-500">
                     <span>5 (Excellent)</span>
                     <span>1 (Poor)</span>
                 </div>
             </div>
             <div class="text-center">
                 <button type="submit"
                     class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                     Submit Rating
                 </button>
             </div>
         </form>
     </div>
 </div>
