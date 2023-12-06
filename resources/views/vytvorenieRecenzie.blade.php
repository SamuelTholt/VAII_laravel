<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vytvorenie Recenzie</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formReview.css')}}">
</head>
<body>
<div class="container">
    <h1>Vytvorenie recenzie</h1>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <p>ID používateľa: {{ Auth::user()->id }}</p>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group">
            <p>Autor: {{ Auth::user()->name }}</p>
        </div>
        <div class="form-group">
            <label for="comments">Komentáre:</label>
            <textarea name="comments" id="comments" required></textarea>
        </div>
        <div class="form-group">
            <label for="star_rating">Hodnotenie hviezdičkami:</label>
            <select name="star_rating" id="star_rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button type="submit">Odoslať recenziu</button>
    </form>
</div>
</body>
</html>

