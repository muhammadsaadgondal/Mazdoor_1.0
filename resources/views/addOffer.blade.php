<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/addOffer.css') }}">
    <title>Add Offer</title>
</head>
<body>
    <main>
        <article>
            <h2>Add your Offer</h2>
            <p>Make an Offer the they can't refuse.</p>
        </article>
        <form id="addOfferForm" action="/addOffer" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Add Offer</h2>
            <div class="group offer">
                <input type="text" placeholder="Proposer Money" id="proposedMoney" required name="proposed_money">
                <input type="number" id="time" placeholder="Time" required name="time">
            </div>
            <div class="group details">
                <textarea id="details" placeholder="Details" name="details"></textarea>
            </div>
            <input type="submit" value="Offer">
        </form>
    </main>
</body>
</html>