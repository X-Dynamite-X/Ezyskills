 <section          class="bg-gradient-to-br bg-[#003F7D]   text-white rounded-b-[3rem] px-8 py-16 mb-12 relative overflow-hidden"
    style="background-image: url('{{ asset('img/bg.png') }}');">
     <div class="absolute inset-0 bg-[url('/img/pattern.png')] opacity-10"></div>
         <div class="container mx-auto flex flex-col md:flex-row items-center justify-center gap-12 relative z-10">
             <div class="bg-white p-6 rounded-2xl shadow-2xl animate-float">
                 <img src="{{ asset('img/course/image 29.png') }}" alt="Angular Logo" class="w-24 h-24 md:w-32 md:h-32">
             </div>
             <div class="text-center">
                 <h1 class="text-4xl md:text-5xl font-bold mb-4">
                     <span class="gradient-text text-[#FF8B36]">{{ $course->title }}:</span><br>
                     Basic to Advance Level Coding
                 </h1>

             </div>
         </div>
</section>
