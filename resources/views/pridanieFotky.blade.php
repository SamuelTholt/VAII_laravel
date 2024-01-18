<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pridanie Fotky</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formReview.css')}}">
</head>
<body>
<div class="container">
    @can('create', $foto)
        <h1>Pridaj fotku</h1>
        <form action="{{ route('fotogaleria.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nazov">Názov súboru:</label>
                <textarea name="nazov" id="nazov" required></textarea>
            </div>
            <div class="form-group">
                <label for="obrazok">Obrázok:</label>
                <input type="file" id="obrazok" name="obrazok" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="typ_id">ID obrázka (1 - jedlo, 2 - reštaurácia):</label>
                <select name="typ_id" id="typ_id" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <button type="submit">Pridať fotku</button>
        </form>
        <span style="margin-right: 10px;"></span>
        <a href="{{ route('fotogaleria') }}"><button type="button">Naspäť</button></a>
    @endcan
        @cannot('create', $foto)
            <h1>Pridávanie fotky</h1>
            <p>Nemôžeš pridávať fotku, pretože nie si admin</p>
            <span style="margin-right: 10px;"></span>
            <a href="{{ route('fotogaleria') }}"><button type="button">Naspäť</button></a>
        @endcannot
</div>
</body>
</html>


