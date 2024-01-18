<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editovanie Fotky</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formReview.css')}}">
</head>
<body>
<div class="container">
    @can('update', $foto)
        <h1>Edituj fotku</h1>
        <form action="{{ route('fotogaleria.update', $foto->foto_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazov">Názov súboru:</label>
                <input type="text" id="nazov" name="nazov" value="{{ $foto->nazov }}" required>
            </div>
            <div class="form-group">
                <label for="current_obrazok">Aktuálny obrázok:</label>
                <img src="{{ asset('storage/obrazky/' . $foto->obrazok) }}" alt="Current Image">
            </div>
            <div class="form-group">
                <label for="obrazok">Nový obrázok (ak chcete aktualizovať):</label>
                <input type="file" id="obrazok" name="obrazok" accept="image/*">
            </div>
            <div class="form-group">
                <label for="typ_id">ID obrázka (1 - jedlo, 2 - reštaurácia):</label>
                <select name="typ_id" id="typ_id" required>
                    <option value="1" {{ $foto->typ_id == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $foto->typ_id == 2 ? 'selected' : '' }}>2</option>
                </select>
            </div>
            <button type="submit">Upraviť</button>
        </form>
        <span style="margin-right: 10px;"></span>
        <a href="{{ route('fotogaleria') }}"><button type="button">Naspäť</button></a>
    @endcan
    @cannot('update', $foto)
            <h1>Editovanie fotky</h1>
            <p>Nemôžeš editovať fotku, pretože nie si admin</p>
            <span style="margin-right: 10px;"></span>
            <a href="{{ route('fotogaleria') }}"><button type="button">Naspäť</button></a>
        @endcannot
</div>
</body>
</html>



