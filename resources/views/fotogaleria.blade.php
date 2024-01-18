<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logoLKRestaurant.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <script src="{{asset('assets/js/js_fotogaleria.js')}}"></script>

    <script type="text/javascript">
        var isAdmin = @json(Auth::check() && Auth::user()->hasRole('admin'));
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>LK Restaurant - Fotogaléria</title>
</head>
<body>
<div class ="fotogaleria"><nav class="navigationBar">
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

    @if(Auth::user() && Auth::user()->hasRole('admin'))
        <section class="py-5">
            <div class="container my-5 whiteColor">
                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <button type="button" onclick="toggle()">Pridaj fotku</button>

                        <form id="addItemForm" style="display: none;" enctype="multipart/form-data">>
                            <h2 class="big-text">Pridanie fotky</h2><br>
                            <div>
                                <label for="nazov">Názov:</label>
                                <input type="text" id="nazov" name="nazov" required>
                            </div>

                            <div>
                                <label for="obrazok">Obrázok:</label>
                                <input type="file" id="obrazok" name="obrazok" accept="image/*" required>
                            </div>

                            <div>
                                <label for="typ_id">Typ ID:</label>
                                <select id="typ_id" name="typ_id" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>

                            <button type="button" onclick="addPhoto()">Pridaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <div class="container">

        <h1 class="whiteColor fw-light text-center text-lg-start mt-4 mb-0">Jedlá</h1>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-start">
        <div class="col-lg-3 col-md-4 col-6">
            <a class="d-block mb-4 h-100" id="gallery-container"></a>
        </div>

            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" id="gallery" src="{{asset('assets/images/food1.jpg')}}" alt="food1">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food2.jpg')}}" alt="food2">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food3.jpg')}}" alt="food3">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food4.jpg')}}" alt="food4">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food5.jpg')}}" alt="food5">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food6.jpg')}}" alt="food6">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food7.jpg')}}" alt="food7">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{asset('assets/images/food8.jpg')}}" alt="food8">
                </a>
            </div>

            <h1 class="whiteColor fw-light text-center text-lg-start mt-4 mb-0">Reštaurácia</h1>

            <hr class="mt-2 mb-5">

            <div class="row text-center text-lg-start">

                <div class="col-lg-3 col-md-4 col-6">
                    <a class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/images/interier1.jpg')}}" alt="interior1">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/images/interior2.jpg')}}" alt="interior2">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/images/interior3.jpg')}}" alt="interior3">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <a class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{asset('assets/images/interior4.jpg')}}" alt="interior4">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
