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
                <input type="number" id="cena" name="cena" value="{{ $jedlo->cena }}" step="0.2" required>
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
                <select name="kategoria_id" id="kategoria_id" required>
                    <option value="1" {{ $jedlo->kategoria_id == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $jedlo->kategoria_id == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $jedlo->kategoria_id == 3 ? 'selected' : '' }}>3</option>
                </select>
            </div>
            <button type="submit">Upraviť</button>
        </form>
        <span style="margin-right: 10px;"></span>
        <a href="{{ route('menu') }}"><button type="button">Naspäť</button></a>
    @endcan
    @cannot('update', $jedlo)
        <h1>Editovanie jedla</h1>
        <p>Nemôžeš editovať jedlo, pretože nie si admin</p>
        <span style="margin-right: 10px;"></span>
        <a href="{{ route('menu') }}"><button type="button">Naspäť</button></a>
    @endcannot
</div>
</body>
</html>
