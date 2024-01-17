<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editovanie Jedla</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formReview.css')}}">
</head>
<body>
<div class="container">
    @can('update', $jedlo)
        <h1>Editovanie jedla</h1>
        <form action="{{ route('menu.update', $jedlo->jedlo_id) }}" method="POST">
            @csrf <!-- Laravel CSRF token pre ochranu pred CSRF útokmi -->
            @method('PUT') <!-- Metóda PUT pre aktualizáciu údajov -->
            <div class="form-group">
                <label for="nazov">Názov:</label>
                <input type="text" id="nazov" name="nazov" value="{{ $jedlo->nazov }}" required>
            </div>
            <div class="form-group">
                <label for="cena">Cena (€):</label>
                <input type="number" id="cena" name="cena" value="{{ $jedlo->cena }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="popis">Popis:</label>
                <textarea id="popis" name="popis" rows="4" required>{{ $jedlo->popis }}</textarea>
            </div>
            <div class="form-group">
                <label for="alergeny">Alergeny:</label>
                <input type="text" id="alergeny" name="alergeny" value="{{ $jedlo->alergeny }}">
            </div>
            <div class="form-group">
                <label for="kategoria_id">Kategória ID:</label>
                <input type="number" id="kategoria_id" name="kategoria_id" value="{{ $jedlo->kategoria_id }}" required>
            </div>
            <button type="submit">Upraviť</button>
        </form>
    @endcan
    @cannot('update', $jedlo)
        <h1>Editovanie jedla</h1>
        <p>Nemôžeš editovať jedlo, pretože nie si admin</p>
    @endcannot
</div>
</body>
</html>
