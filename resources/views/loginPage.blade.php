<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/loginPage.css') }}">
    <title>Log in</title>
</head>
<body>
    <main>
        <article>
            <h2>Welcome Back!</h2>
            <p>New job awaits you.<br></p>
            <h3>Don't have an account?</h3>
            <a href="./signupPage">
                <button>Sign up</button>
            </a>
        </article>
        <form id="loginForm" action="/loginPage" method="POST">
            @csrf
            <h2>Sign in</h2>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="button" value="Forgot password?">
            <input type="submit" value="Sign in">
        </form>
    </main>
</body>
</html>