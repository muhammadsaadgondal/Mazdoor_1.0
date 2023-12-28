@extends('layouts.mainLayout')

@section('sectionX')
<div class="assignment-section text-center">
    <h2>Current Assignments</h2>
    <div class="row justify-content-center">
        <!-- Individual Assignment Card -->
        <div class="col-md-6 mb-4">
            @foreach($assignments as $assignment)
            <div class="card">
                <img src="https://images.unsplash.com/photo-1555963966-b7ae5404b6ed?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8ZWxlY3RyaWNpYW58ZW58MHx8MHx8fDA%3D" class="card-img-top mx-auto mt-3" alt="Assignment Image">
                <div class="card-body">
                    <h5 class="card-title">{{$assignment->serviceprovider_username}}</h5>
                    <p class="card-text">Amount {{$assignment->proposed_money}}</p>
                    <p class="card-text">{{$assignment->actual_duration}}</p>
                    <p class="card-text">{{$assignment->details}}</p>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Add more assignment cards as needed -->
    </div>
</div>

@endsection