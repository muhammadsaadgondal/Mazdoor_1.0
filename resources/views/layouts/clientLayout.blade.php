<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/test.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar main-nav navbar-expand-lg navbar-dark bg-dark">
        <!-- Logo on the Left -->
        <a class="navbar-brand" href="#">
            Mazdoor
        </a>

        <!-- Toggle button for small screens -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="#">Create</a>
                <a class="nav-item nav-link" href="/switch">Switch</a>
                <a class="nav-item nav-link" href="/logout">Logout</a>
            </div>
        </div>
    </nav>


    <div class="container profile-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card profile-card">

                    <div class="cover-photo">
                        <img class="cover-image" src="https://i.ytimg.com/vi/DPQdnMx7FPc/maxresdefault.jpg" alt="Cover Photo">
                    </div>

                    <div class="profile-photo">
                        <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" alt="Profile Photo">
                    </div>
                    <div class="profile-info">
                        <div class="name-location">
                            <h5 class="card-title">{{$user->f_name}} {{$user->l_name}}</h5>
                            <p class="card-text">{{$user->username}}.</p>
                        </div>

                        <button class="btn btn-primary connect-btn">Connect</button>
                    </div>

                </div>

                <div class="card navbar-card">
                    <nav class="navbar navbar-expand">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('c_jobs') ? 'active' : '' }}" href="{{ route('c_jobs') }}">Sites</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('c_history') ? 'active' : '' }}" href="{{ route('c_history') }}">History</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('c_reviews') ? 'active' : '' }}" href="{{ route('c_reviews') }}">Reviews</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('c_offers') ? 'active' : '' }}" href="{{ route('c_offers') }}">Offers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('c_settings') ? 'active' : '' }}" href="{{ route('c_settings') }}">Settings</a>
                            </li>
                        </ul>

                    </nav>
                    <div>
                        @yield('sectionX')
                    </div>
                </div>
            </div>

            <div class=" col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bio-section">
                            <h2>About</h2>
                            <p><i class="fas fa-envelope"></i> Email: {{$user->email}}</p>
                            <p><i class="fas fa-user"></i> username: {{$user->username}}</p>
                            <p><i class="fas fa-phone"></i> Contact: {{$user->phone}}</p>
                            <p><i class="fas fa-star"></i> Rating: 4.5</p>
                        </div>


                    </div>
                    <div class="col-lg-12">
                        <div class="skill-tags-section mt-4 card text-center">
                            <h2>Work Experience</h2>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="total-jobs">
                                    <h5>Total Jobs</h5>
                                    <p>{{$jobCount}}</p>
                                </div>
                                <div class="vertical-line mx-4">
                                    <hr class="vertical-line-hr">
                                </div>
                                <div class="rating">
                                    <h5>Rating</h5>
                                    <p>{{$avgStars}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>