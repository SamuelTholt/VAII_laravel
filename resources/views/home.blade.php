<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset='utf-8'>
    <link rel="icon" type="image/png" href=" {{asset('assets/images/logoLKRestaurant.png')}} ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>LK Restaurant</title>
</head>
<body>
<div class="mainMenu">
    <nav class="navigationBar">
        <a href="#" class="logo">
            <img src="{{asset('assets/images/logoLKRestaurant.png')}}" alt="LK Restaurant">
        </a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="fas fa-bars"></i></label>
        <div class="menuList">
            <ul class="list">
                <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Domov</a></li>
                <li><a href="#"><i class="fas fa-utensils"></i> Menu</a></li>
                <li><a href="{{url('fotogaleria')}}"><i class="fas fa-camera"></i> Fotogaléria</a></li>
                <li><a href="{{url('recenzie')}}"><i class="fas fa-star"></i> Recenzie</a></li>
                <li><a href="{{url('kontakt')}}"><i class="fas fa-envelope"></i> Kontakt</a></li>
                <li><a href="{{url('oNas')}}"><i class="fas fa-info-circle"></i> O nás</a></li>
            </ul>
        </div>
    </nav>

</div>
</body>
</html>
