<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/addSkill.css') }}">
    <title>Add Skill</title>
</head>
<body>
    <main>
        <article>
            <h2>Add your Skill</h2>
            <p>We are delighted to have you with us.</p>
        </article>
        <form id="addSkillForm" action="/addSkill" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Add Skill</h2>
            <div class="group skill">
                <select name="name" id="skill" required>
                    <option disabled selected hidden id="disabled">Select Skill</option>
                    <option value="mason">Mason</option>
                    <option value="mazdoor">Mazdoor</option>
                    <option value="electrician">Electrician</option>
                    <option value="cook">Cook</option>
                    <option value="tiler">Tiler</option>
                    <option value="painter">Painter</option>
                </select>
                <input type="number" id="working_since" placeholder="Working Since" required name="working_since">
            </div>
            <div class="group description">
                <textarea  id="description" placeholder="Description" name="description"></textarea>
            </div>
            <input type="submit" value="Add Skill">
        </form>
    </main>
</body>
</html>