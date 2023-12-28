@extends('layouts.clientLayout')

@section('sectionX')
<div class="review-section">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-center">Reviews</h2>

        <!-- Search Bar -->

    </div>
    @if($reviews->isEmpty())
    <p class="text-center">No results found.</p>
    @else
    @foreach($reviews as $review)
    <div class="review">
        <div class="reviewer-info">
            <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" alt="Reviewer Profile Image">
            <p class="name">{{$review->person_username}}</p>

        </div>
        <div class="rating">
            <!-- Add star icons or other rating representation here -->
            Stars {{$review->stars}}
        </div>
        <p class="review-content">{{$review->comment}}</p>
    </div>
    @endforeach
    @endif

</div>

<script>
    function searchData() {
        var input, filter, reviewSection, review, name, i, txtValue;

        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        reviewSection = document.querySelector(".review-section");
        review = reviewSection.getElementsByClassName("review");

        // Loop through all reviews and hide those that don't match the search query
        for (i = 0; i < review.length; i++) {
            name = review[i].getElementsByClassName("name")[0];
            txtValue = name.textContent || name.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                review[i].style.display = "";
            } else {
                review[i].style.display = "none";
            }
        }

        // Fetch search results from the server using fetch API
        fetch('/search?query=' + filter)
            .then(response => response.json())
            .then(data => {
                // Update the content with fetched data
                // Replace the code below with your logic to update the reviews section
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
@endsection