<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/serviceproviderSignupPage.css') }}">
    <title>Sign Up</title>
</head>
<body>
    <main>
        <article>
            <h2>Welcome!</h2>
            <p>We are delighted to have you with us.</p>
            <h3>Already have an account?</h3>
            <a href="./loginPage">
                <button>Log in</button>
            </a>
        </article>
        <form id="signupForm" action="/serviceproviderSignupPage" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Sign up</h2>
            <div class="group address">
                <input type="text" placeholder="Address" id="address" required name="address">
                <input type="text" id="location" placeholder="Location" required name="location">
            </div>
            <input type="submit" value="Sign up">
        </form>
    </main>
</body>
</html>