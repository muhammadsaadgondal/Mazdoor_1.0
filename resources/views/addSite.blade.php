<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/addSite.css') }}">
    <title>Sign Up</title>
</head>
<body>
    <main>
        <article>
            <h2>Add a new Site</h2>
            <p>A Site is the home of all the Jobs</p>
        </article>
        <form id="addSiteForm" action="/addSite" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Add Site</h2>
            <div class="group address">
                <input type="text" placeholder="Address" id="address" required name="address">
                <input type="text" id="location" placeholder="Location" required name="location">
            </div>
            <div class="group description">
                <textarea  id="description" placeholder="Description" name="description"></textarea>
            </div>
            <input type="submit" value="Add">
        </form>
    </main>
</body>
</html>