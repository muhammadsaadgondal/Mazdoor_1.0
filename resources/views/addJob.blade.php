<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/addSkill.css') }}">
    <title>Add Job</title>
</head>
<body>
    <main>
        <article>
            <h2>Add Job</h2>
            <p>Job is the atomic work.</p>
        </article>
        <form id="addJobForm" action="/addJob" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Add Job</h2>
            <div class="group skill">
                <select name="skill" id="skill" required>
                    <option disabled selected hidden id="disabled">Select Skill</option>
                    <option value="mason">Mason</option>
                    <option value="mazdoor">Mazdoor</option>
                    <option value="electrician">Electrician</option>
                    <option value="cook">Cook</option>
                    <option value="tiler">Tiler</option>
                    <option value="painter">Painter</option>
                </select>
                <input type="number" id="preferred_time" placeholder="Preferred Time" name="preferred_time">
            </div>
            <div class="group description">
                <textarea  id="description" placeholder="Description" name="description"></textarea>
            </div>
            <input type="submit" value="Add Job">
        </form>
    </main>
</body>
</html>