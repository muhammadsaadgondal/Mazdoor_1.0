@extends('layouts.mainLayout')

@section('sectionX')
<div class="container mt-4">
    <h2 class="mb-4">Search Results</h2>

    <!-- Search Bar -->
    <div class="input-group mb-3">
        <input onkeyup="searchData()" type="text" id="searchInput" class="form-control" placeholder="Search...">
    </div>

    <!-- Display Search Results -->
    <div id="searchResults" class="row">
        <!-- Search results will be displayed here -->
        @if($offers->isEmpty())
        <p class="text-center">No results found.</p>
        @else
        @foreach($persons as $person)
        <div class="col-md-4 mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $person->f_name }} {{ $person->l_name }}</h5>
                <p class="card-text">Email: {{ $person->email }}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<script src="js/fetchScript.js"></script>
</script>
@endsection