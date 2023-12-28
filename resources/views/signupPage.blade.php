<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/signupPage.css') }}">
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
        <form id="signupForm" action="/signupPage" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Sign up</h2>
            <div class="group name">
                <input type="text" placeholder="First Name" id="firstName" required name="f_name">
                <input type="text" id="lastName" placeholder="Last Name" required name="l_name">
            </div>
            <div class="group contact">
                <input type="tel" id="phone" placeholder="Phone Number" required name="phone">
                <input type="email" id="email" placeholder="E-mail" required name="email">
            </div>
            <div class="group username">
                <input type="text" placeholder="username" id="username" required name="username">
            </div>
            <div class="group password">
                <input type="password" id="password" placeholder="Password" required name="password">
                <input type="password" id="confirmPassword" placeholder="Confirm Passowrd" required>
            </div>
            <input type="submit" value="Sign up">
        </form>
    </main>
</body>
</html>