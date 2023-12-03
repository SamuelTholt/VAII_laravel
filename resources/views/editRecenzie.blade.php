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
    <h1>Editovanie recenzie recenzie</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf <!-- Laravel CSRF token pre ochranu pred CSRF útokmi -->
        @method('PUT') <!-- Metóda PUT pre aktualizáciu údajov -->
        <div class="form-group">
            <p>ID používateľa: {{ Auth::user()->id }}</p>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group">
            <p>Autor: {{ Auth::user()->name }}</p>
        </div>
        <div class="form-group">
            <label for="comments">Komentáre:</label>
            <textarea name="comments" id="comments" required>{{ $review->comments }}</textarea>
        </div>
        <div class="form-group">
            <label for="star_rating">Hodnotenie hviezdičkami:</label>
            <select name="star_rating" id="star_rating" required>
                <option value="1" {{ $review->star_rating == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $review->star_rating == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $review->star_rating == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ $review->star_rating == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ $review->star_rating == 5 ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <button type="submit">Upraviť</button>
    </form>
</div>
</body>
</html>

