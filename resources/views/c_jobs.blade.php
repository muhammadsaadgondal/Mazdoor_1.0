@extends('layouts.clientLayout')

@section('sectionX')
<div class="assignment-section text-center">
    <h2>Active Sites</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <!-- Display User's Created Sites -->
        <div class="col-md-6 mb-4">
            @if($sites->isEmpty())
            <p class="text-center">No results found.</p>
            @else
            @foreach ($sites as $site)
                <div class="card">
                    <!-- Display content for existing sites -->
                    <p>Location: {{ $site->location }}</p>
                    <p>Details: {{ $site->details }}</p>
                    <p>Address: {{ $site->address }}</p>
                    
                    <!-- Delete Site Button -->
                    <form action="{{ route('delete_site', ['siteId' => $site->site_id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-site" data-toggle="modal" data-target="#deleteSiteModal">Delete Site</button>
                    </form>
                </div>
            @endforeach
            @endif
        </div>

        <!-- Form to add a new site (Initially hidden) -->
        <div class="col-md-6 mb-4" style="display: none;" id="newSiteFormContainer">
            <div class="card">
                <div class="card-body">
                    <form action="/add_new_site" method="POST" enctype="multipart/form-data" id="newSiteForm">
                        @csrf
                        <!-- Add your form fields for the new site here -->
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea class="form-control" id="details" name="details" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>

                        <input type="submit" value="Add Site" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button to toggle the visibility of the new site form -->
    <button class="btn btn-primary" id="showNewSiteForm">Add new Site</button>

    <!-- Delete Site Confirmation Modal -->
    <div class="modal fade" id="deleteSiteModal" tabindex="-1" role="dialog" aria-labelledby="deleteSiteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSiteModalLabel">Delete Site</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this site?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script to toggle the visibility of the new site form
        document.getElementById('showNewSiteForm').addEventListener('click', function () {
            var newSiteFormContainer = document.getElementById('newSiteFormContainer');
            newSiteFormContainer.style.display = (newSiteFormContainer.style.display === 'none') ? 'block' : 'none';
        });

        // Script to confirm site deletion
        document.querySelectorAll('.delete-site').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var deleteForm = btn.closest('form');
                document.getElementById('confirmDelete').addEventListener('click', function () {
                    deleteForm.submit();
                });
            });
        });
    </script>
</div>

@endsection
