<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logoLKRestaurant.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - LK Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{asset('assets/js/js_kontakt.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class ="kontakt"><nav class="navigationBar">
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
                @if(Auth::user())
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="text" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-to-bracket"></i> {{ Auth::user()->name }}
                            <span class="text-sm text-gray-500">
                            @foreach(Auth::user()->role as $role)
                                    [{{ $role->name_of_role }}]
                                @endforeach
                        </span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a></li>
                            <li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    {{ __('Profil') }}
                                </a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Odhlásiť sa
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="text" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-to-bracket"></i> Login/Register
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{url('login')}}">Prihlásiť sa</a></li>
                            <li><a class="dropdown-item" href="{{url('register')}}">Zaregistrovať sa</a></li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </nav>
    <header class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/contact-banner-2.jpg')}}')">
        <div class="text-center my-5">
            <h1 class="text-black fs-3 fw-bolder">Kontakt</h1>
        </div>
    </header>

    <section class="py-5">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Otváracie Hodiny</h2>
                    <p class="lead" id ="openingHours">
                    </p>

                    <h2>Kontaktujte nás:</h2>
                    <p class="lead">
                        <span class="bold">Email:</span> <span id="email">Zobraziť email</span><br>
                        <span class="bold">Telefón:</span> <span id="phone">Zobraziť telefónne číslo</span>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <div class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/italian-restaurant.jpg')}}')">
        <div style="height: 20rem"></div>
    </div>

    <section class="py-5">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Nájdete nás na tejto adrese:</h2>
                    <p class="lead">
                        031 01 Liptovský Mikuláš, Námestie mieru
                    </p>

                </div>
            </div>

        </div>
    </section>

    <div class="container-fluid g-0">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="lc-block overflow-hidden">
                    <div style="max-height:40vh" class="ratio ratio-1x1">
                        <iframe src="https://www.google.com/maps?q=N%C3%A1mestie+Mieru%2C+Liptovsk%C3%BD+Mikul%C3%A1%C5%A1&amp;t=m&amp;z=12&amp;output=embed&amp;iwloc=near"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
