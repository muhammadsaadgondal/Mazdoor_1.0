@extends('layouts.clientLayout')




@section('sectionX')
<div class="history-section text-center">
        <h2>Job History</h2>

        <div class="row justify-content-center">
            <!-- Individual Job Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1676535061989-32e38dfdc5be?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y29uc3RydWNpdG9ufGVufDB8fDB8fHww" class="card-img-top mx-auto mt-3" alt="Job Image">
                    <div class="card-body">
                        <h5 class="card-title">Software Developer</h5>
                        <p class="card-text">Company: ABC Tech</p>
                        <p class="card-text">Amount: $5000</p>
                        <p class="card-text">Reviews: ★★★★☆</p>
                        <p class="card-text">Time Taken: 2 weeks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1652303518372-79ad122e3181?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29uc3RydWNpdG9ufGVufDB8fDB8fHww" class="card-img-top mx-auto mt-3" alt="Job Image">
                    <div class="card-body">
                        <h5 class="card-title">Software Developer</h5>
                        <p class="card-text">Company: ABC Tech</p>
                        <p class="card-text">Amount: $5000</p>
                        <p class="card-text">Reviews: ★★★★☆</p>
                        <p class="card-text">Time Taken: 2 weeks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/70" class="card-img-top mx-auto mt-3" alt="Job Image">
                    <div class="card-body">
                        <h5 class="card-title">Software Developer</h5>
                        <p class="card-text">Company: ABC Tech</p>
                        <p class="card-text">Amount: $5000</p>
                        <p class="card-text">Reviews: ★★★★☆</p>
                        <p class="card-text">Time Taken: 2 weeks</p>
                    </div>
                </div>
            </div>
            <!-- Add more job cards as needed -->
        </div>
    </div>
@endsection