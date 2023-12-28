@extends('layouts.mainLayout')

@section('sectionX')
<div class="offers-section mt-4 justify-content-center">
    <h2 class="text-center">Offers</h2>

    @if($offers->isEmpty())
    <p class="text-center">No results found.</p>
    @else
    <div class="row">
        @foreach($offers as $offer)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$offer->serviceprovider_username}}</h5>
                    <p class="card-text">Proposed Money: {{$offer->proposed_money}}</p>
                    <p class="card-text">Description: {{$offer->details}}</p>
                    <p class="card-text">Time: {{$offer->time}}</p>
                    <button class="btn btn-success" id="addJob">Accept</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <button id="addOfferButton" class="btn btn-primary" style="margin-left: 43.5%;">Add Offer</button>
</div>
<script>
    document.getElementById('addOfferButton').addEventListener('click', function() {
        fetch('/addOffer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // You can include additional headers if needed
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle the data if needed
            console.log(data);
            // Redirect to the addOffer route
            window.location.href = '/addOffer';
        })
        .catch(error => {
            // Handle errors
            console.error('There was a problem with the fetch operation:', error);
        });
    });
</script>
@endsection