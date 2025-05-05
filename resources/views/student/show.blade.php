 @extends('layouts.app')
 @section('title')
     {{ $enrollment->course->title }} Course
 @endsection

 @section('css')
     <style>
         .rating-stars input:checked~label,
         .rating-stars label:hover,
         .rating-stars label:hover~label {
             color: #fbbf24;
             /* لون النجوم عند التحديد أو التحويم */
         }
     </style>
 @endsection

 @section('main')
     <!-- Hero Section with improved design -->
     @include('student.corses.ferstSection', compact('enrollment'))

     <div class="container mx-auto px-4">



         <!-- Main Content Grid -->
         <div class="grid grid-cols-1 lg:grid-cols-3  ">
             <!-- Left Content -->

             <div class="lg:col-span-2 w-full">
                 @include('student.corses.rightSidebar', compact('enrollment'))
             </div>
             @include('student.corses.courseContent', compact('enrollment'))

             <!-- Right Sidebar -->

         </div>


         @include('student.corses.projects', compact('enrollment'))
         @include('student.rating',compact( 'enrollment'))

     </div>
 @endsection
@section("js")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Handle star hover and selection
    $('.star-label').hover(
        function() {
            // On mouse enter, highlight stars
            const rating = $(this).data('rating');
            highlightStars(rating);
        },
        function() {
            // On mouse leave, restore to selected rating or clear
            const selectedRating = $('input[name="rating"]:checked').val();
            if (selectedRating) {
                highlightStars(selectedRating);
            } else {
                $('.star-label').removeClass('text-yellow-400').addClass('text-gray-300');
                $('#selectedRating').addClass('hidden');
            }
        }
    );

    // Handle star click
    $('.star-label').click(function() {
        const rating = $(this).data('rating');
        $(`#simpleStar${rating}`).prop('checked', true);
        highlightStars(rating);

        // Show selected rating text
        $('#ratingValue').text(rating);
        $('#selectedRating').removeClass('hidden');
    });

    // Form submission
    $('#simpleEvaluationForm').submit(function(e) {
        e.preventDefault();

        const selectedRating = $('input[name="rating"]:checked').val();
        if (!selectedRating) {
            alert('Please select a rating before submitting.');
            return;
        }


        $.ajax({
              url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Rating submitted successfully!');
            },
            error: function(xhr) {
                alert('Error submitting rating. Please try again.');
            }
        });

    });

    // Helper function to highlight stars
    function highlightStars(rating) {
        $('.star-label').each(function() {
            if ($(this).data('rating') <= rating) {
                $(this).removeClass('text-gray-300').addClass('text-yellow-400');
            } else {
                $(this).removeClass('text-yellow-400').addClass('text-gray-300');
            }
        });
    }
});
</script>
@endsection
