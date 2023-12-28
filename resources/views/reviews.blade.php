@extends('layouts.mainLayout')

@section('sectionX')
<div class="review-section">
    <h2 class="text-center">Reviews</h2>
    <div class="input-group mb-3">
        <input onkeyup="searchData()" type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>
    <!-- Individual Review -->
    <div class="review-section" id="review-section">
        @if($reviews->isEmpty())
        <p class="text-center">No results found.</p>
        @else
        @foreach($reviews as $review)
        <div class="review">
            <div class="reviewer-info">
                <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" alt="Reviewer Profile Image">
                <p class="name">{{$review->person_username}}</p>
                <div class="name-time">
                    <p class="time">{{$review->review_id}}</p>
                </div>
            </div>
            <div class="rating">
                <!-- Add star icons or other rating representation here -->
                Rating: {{$review->stars}}
            </div>
            <p class="review-content">{{$review->comment}}</p>
        </div>
        @endforeach
        @endif

    </div>

    <button class="btn btn-primary" style="margin: 10px;" id="fetchMoreBtn" onclick="fetchMoreReviews()">Fetch More</button>
</div>

<script>
    function fetchMoreReviews() {
        const currentReviewsLength = document.querySelectorAll('.review').length;

        // Make a fetch call to your backend to get more reviews
        fetch(`/fetch-more-reviews/length=${currentReviewsLength}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (Array.isArray(data.reviews)) {
                    // Assuming there's a function to append reviews to the DOM
                    appendReviewsToDOM(data.reviews);
                } else {
                    console.error('Invalid response structure or data.reviews is not an array:', data);
                }
            })
            .catch(error => console.error('Error fetching more reviews:', error));
    }

    // Assuming you have a function to append reviews to the DOM
    function appendReviewsToDOM(reviews) {
        const reviewSection = document.getElementById('review-section');

        // Clear existing content in reviewSection
        reviewSection.innerHTML = '';

        reviews.forEach(review => {
            const reviewDiv = document.createElement('div');
            reviewDiv.className = 'review';

            // Assuming 'comment' is a property of the review
            reviewDiv.innerHTML = `
            <div class="reviewer-info">
                <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" alt="Reviewer Profile Image">
                <p class="name">${review.person_username}</p>
                <div class="name-time">
                    <p class="time">${review.review_id}</p>
                </div>
            </div>
            <div class="rating">
                Rating: ${review.stars}
            </div>
            <p class="review-content">${review.comment}</p>
        `;

            // Append the new reviewDiv to the reviewSection
            reviewSection.appendChild(reviewDiv);
        });
    }
</script>

<script src="js/fetchScript.js"></script>

@endsection