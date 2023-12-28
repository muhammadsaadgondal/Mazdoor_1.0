@extends('layouts.mainLayout')



@section('sectionX')
<div class="offers-section mt-4 justify-content-center ">
    <h2 class="text-center ">Offers</h2>

    <div class="row" >
        <!-- Individual Offer Card -->
        <div class="col-md-6 mb-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Web Development</h5>
                    <p class="card-text">Proposed Money: $1000</p>
                    <p class="card-text">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="card-text">Time: 2 weeks</p>
                    <button class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>

        <!-- Add more offer cards as needed -->
    </div>
</div>

@endsection