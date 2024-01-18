<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logoLKRestaurant.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu - LK Restaurant</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{asset('assets/js/js_menu.js')}}"></script>

    <script type="text/javascript">
        var isAdmin = @json(Auth::check() && Auth::user()->hasRole('admin'));
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class ="oNas"><nav class="navigationBar">
        <a href="#" class="logo">
            <img src="{{asset('assets/images/logoLKRestaurant.png')}}" alt="LK Restaurant">
        </a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="fas fa-bars"></i></label>
        <div class="menuList">
            <ul class="list">
                <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Domov</a></li>
                <li><a href="{{url('menu')}}"><i class="fas fa-utensils"></i> Menu</a></li>
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
    <header class="py-5 bg-image-full" style="background-image: url('{{asset('assets/images/menu.jpg')}}')">
        <div class="text-center my-5">
            <h1 class="text-white fs-3 fw-bolder">Menu</h1>
        </div>
    </header>

    @if(Auth::user() && Auth::user()->hasRole('admin'))
        <section class="py-5">
            <div class="container my-5 whiteColor">
                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <button type="button" onclick="toggleForm()">Pridaj jedlo</button>

                        <form id="addItemForm" style="display: none;">
                            <h2 class="big-text">Pridanie jedla</h2><br>
                            <div>
                                <label for="nazov">Názov:</label>
                                <input type="text" id="nazov" name="nazov" required>
                            </div>

                            <div>
                                <label for="cena">Cena (€):</label>
                                <input type="number" id="cena" name="cena" step="0.2" required>
                            </div>

                            <div>
                                <label for="popis">Popis:</label>
                                <textarea id="popis" name="popis" rows="4" required></textarea>
                            </div>

                            <div>
                                <label for="alergeny">Alergeny:</label>
                                <input type="text" id="alergeny" name="alergeny">
                            </div>

                            <div>
                                <label for="kategoria_id">Kategória ID:</label>
                                <select id="kategoria_id" name="kategoria_id" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <button type="button" onclick="addMenuItem()">Pridaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5">
        <div class="container my-5 whiteColor">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="big-text">Menu</h2><br>
                    <h3 class="larger-text">Polievky</h3><br>
                    <div id="polievky" class="medium-text"></div><br><br>
                    <h3 class="larger-text">Hlavné jedlá</h3><br>
                    <div id="hlavneJedla" class="medium-text"></div><br><br>
                    <h3 class="larger-text">Prílohy</h3><br>
                    <div id="prilohy" class="medium-text"></div><br>
                </div>
            </div>
        </div>
    </section>

</div>
</body>
</html>
