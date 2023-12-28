@extends('layouts.clientLayout')



@section('sectionX')
<div class="offers-section mt-4 justify-content-center ">
    <h2 class="text-center ">Offers</h2>

    <div class="row" >
       @foreach($offers as $offer)
        <div class="col-md-6 mb-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$offer->serviceprovider_username}} </h5>
                    <p class="card-text">Proposed Money: {{$offer->proposed_money}}</p>
                    <p class="card-text">Description: {{$offer->details}}</p>
                    <p class="card-text">Time: {{$offer->time}}</p>
                    <button class="btn btn-success">Accept</button>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Add more offer cards as needed -->
    </div>
</div>

@endsection